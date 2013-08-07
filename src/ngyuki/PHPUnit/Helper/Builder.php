<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnit\Helper;

/**
 * @author ngyuki
 */
class Builder
{
    public function run($dir = __DIR__)
    {
        $fn = "$dir/AssertChain.php";

        $output = $this->generate();

        file_put_contents($fn, $output);
        echo "ok ... $fn\n";
    }

    public function generate()
    {
        $funcs = $this->collect();
        $output = $this->apply($funcs);

        return $output;
    }

    protected function collect()
    {
        $assert = new \ReflectionClass(__NAMESPACE__ . '\\Assert');

        $funcs = array();

        foreach ($assert->getMethods() as $method)
        {
            $method instanceof \ReflectionMethod;

            $doc = $method->getDocComment();

            if (preg_match('/@return\s+(\w+)/', $doc, $m) == 0)
            {
                continue;
            }

            list ($match, $class) = $m;

            try
            {
                $cons = new \ReflectionClass($class);

                if (!$cons->isSubclassOf('PHPUnit_Framework_Constraint'))
                {
                    continue;
                }
            }
            catch (\ReflectionException $ex)
            {
                continue;
            }

            $doc = str_replace($match, '@return AssertChain', $doc);

            $args = $this->collectArgs($method);

            if ($args !== null)
            {
                $funcs[$method->getName()] = array(
                    $method->getDeclaringClass()->getName(),
                    $doc,
                    $args
                );
            }
        }

        return $funcs;
    }

    protected function apply($funcs)
    {
        $dir = __DIR__;

        $class_in = file_get_contents("$dir/AssertChain.php.class.in");
        $method_in = file_get_contents("$dir/AssertChain.php.method.in");

        $methods = array();

        foreach ($funcs as $name => $func)
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

        foreach ($params as $param)
        {
            $param instanceof \ReflectionParameter;

            $str = '';

            if ($param->isArray())
            {
                $str .= 'array ';
            }

            if ($param->isCallable())
            {
                $str .= 'callable ';
            }

            if ($param->getClass())
            {
                $str .= '\\' . $param->getClass()->getName() . ' ';
            }

            if ($param->isPassedByReference())
            {
                return null;
            }

            $str .= '$' . $param->getName();

            if ($param->isDefaultValueAvailable())
            {
                $str .= ' = ' . var_export($param->getDefaultValue(), true);
            }

            $args[] = $str;
        }

        return implode(', ', $args);
    }

}
