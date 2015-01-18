<?php
namespace ngyuki\PHPUnitHelper\Constraint;

class LogicalAnd extends \PHPUnit_Framework_Constraint_And
{
    public function addConstraint(\PHPUnit_Framework_Constraint $c)
    {
        $this->constraints[] = $c;
        return $this;
    }
}
