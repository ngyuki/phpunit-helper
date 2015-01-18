<?php
namespace ngyuki\PHPUnitHelper\Constraint;

use PHPUnit_Framework_Constraint;

class ChainBase extends \PHPUnit_Framework_Constraint_Or
{
    private $current;
    private $not = false;

    public function __construct()
    {
        $this->current = new LogicalAnd();
        $this->constraints[] = $this->current;
    }

    protected function chain(PHPUnit_Framework_Constraint $c)
    {
        if ($this->not) {
            $c = new \PHPUnit_Framework_Constraint_Not($c);
            $this->not = false;
        }
        $this->current->addConstraint($c);
        return $this;
    }

    public function not()
    {
        $this->not = !$this->not;
        return $this;
    }

    public function logicalOr()
    {
        $this->constraints[] = $this->current = new LogicalAnd();
        return $this;
    }

    public function __get($name)
    {
    }
}
