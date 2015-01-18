<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnitHelper;

/**
 * @author ngyuki
 */
class AssertChainBase
{
    protected $val;
    protected $not = false;
    protected $list = null;

    /**
     * @param mixed $val
     */
    public function __construct($val)
    {
        $this->val = $val;
    }

    /**
     * @param \PHPUnit_Framework_Constraint $cons
     */
    protected function assertThat(\PHPUnit_Framework_Constraint $constraint)
    {
        if ($this->not)
        {
            $constraint = new \PHPUnit_Framework_Constraint_Not($constraint);
        }

        if ($this->list !== null)
        {
            $this->list[] = $constraint;
        }
        else
        {
            Assertion::assertThat($this->val, $constraint);
        }
    }

    public function not()
    {
        $this->not = true;
        return $this;
    }

    public function be()
    {
        $this->not = false;
        return $this;
    }

    public function and_()
    {
        return $this->end_();
    }

    public function or_()
    {
        $this->end_();
        $this->list = array();
        return $this;
    }

    public function end_()
    {
        if ($this->list !== null)
        {
            $list = $this->list;
            $this->list = null;

            $or = new \PHPUnit_Framework_Constraint_Or();
            $or->setConstraints($list);

            Assertion::assertThat($this->val, $or);
        }

        return $this;
    }

    public function __destruct()
    {
        $this->end_();
    }
}
