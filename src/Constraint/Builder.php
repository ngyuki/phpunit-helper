<?php
namespace ngyuki\PHPUnitHelper\Constraint;

class Builder
{
    public function run($dir = __DIR__)
    {
        $fn = "$dir/Chain.php";
        $output = $this->generate();
        file_put_contents($fn, $output);
        echo "ok ... $fn\n";
    }

    public function generate()
    {
        $functions = $this->collect();
        $output = $this->apply($functions);

        return $output;
    }

    protected function collect()
    {
        $assert = new \ReflectionClass('ngyuki\PHPUnitHelper\Assertion');

        $functions = array();

        /* @var $method \ReflectionMethod */
        foreach ($assert->getMethods() as $method) {
            $doc = $method->getDocComment();

            if (preg_match('/@return\s+(\w+)/', $doc, $m) == 0) {
                continue;
            }

            list ($match, $class) = $m;

            try {
                $cons = new \ReflectionClass($class);

                if (!$cons->isSubclassOf('PHPUnit_Framework_Constraint')) {
                    continue;
                }
            } catch (\ReflectionException $ex) {
                continue;
            }

            $doc = str_replace($match, '@return $this', $doc);

            $args = $this->collectArgs($method);

            if ($args !== null) {
                $functions[$method->getName()] = array(
                    $method->getDeclaringClass()->getName(),
                    $doc,
                    $args
                );
            }
        }

        return $functions;
    }

    protected function apply($functions)
    {
        $dir = __DIR__;

        $class_in = file_get_contents("$dir/Chain.php.class.in");
        $method_in = file_get_contents("$dir/Chain.php.method.in");

        $methods = array();

        foreach ($functions as $name => $func)
        {
            list ($class, $doc, $args) = $func;

            $methods[] = strtr($method_in, array(
                '{%class}' => $class,
                '{%name}' => $name,
                '{%args}' => $args,
                '{%doc}'  => $doc,
            ));
        }

        $methods = implode("\n", $methods);

        return strtr($class_in, array(
            '{%methods}' => rtrim($methods),
        ));
    }

    protected function collectArgs(\ReflectionMethod $method)
    {
        $params = $method->getParameters();

        $args = array();

        /* @var $param \ReflectionParameter */
        foreach ($params as $param) {
            $str = '';

            if ($param->isArray()) {
                $str .= 'array ';
            }

            if (method_exists($param, 'isCallable') && $param->isCallable()) {
                $str .= 'callable ';
            }

            if ($param->getClass()) {
                $str .= '\\' . $param->getClass()->getName() . ' ';
            }

            if ($param->isPassedByReference()) {
                return null;
            }

            $str .= '$' . $param->getName();

            if ($param->isDefaultValueAvailable()) {
                $str .= ' = ' . var_export($param->getDefaultValue(), true);
            }

            $args[] = $str;
        }

        return implode(', ', $args);
    }
}
