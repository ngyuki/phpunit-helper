<?php
namespace ngyuki\PHPUnitHelper\Constraint;

use PHPUnit_Framework_Constraint;

/**
 * @property $this not
 * @property $this or
 */
class ChainBase extends \PHPUnit_Framework_Constraint_Or
{
    private $current;
    private $not = false;

    public function __construct()
    {
        $this->current = new LogicalAnd();
        $this->constraints[] = $this->current;
    }

    public function addConstraint(PHPUnit_Framework_Constraint $c)
    {
        if ($this->not) {
            $c = new \PHPUnit_Framework_Constraint_Not($c);
            $this->not = false;
        }
        $this->current->addConstraint($c);
        return $this;
    }

    public function logicalNot()
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
        if ($name === 'not') {
            return $this->logicalNot();
        } else if ($name === 'or') {
            return $this->logicalOr();
        } else {
            throw new \BadMethodCallException(__METHOD__);
        }
    }
}
