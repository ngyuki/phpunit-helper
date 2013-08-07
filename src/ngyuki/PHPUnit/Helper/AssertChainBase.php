<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnit\Helper;

/**
 * @author ngyuki
 */
class AssertChainBase
{
    protected $val;
    protected $not = false;

    protected $opr;
    protected $stack = array();
    protected $list = array();


    /**
     * @param mixed $val
     */
    public function __construct($val)
    {
        $this->opr = new \PHPUnit_Framework_Constraint_And();
        $this->val = $val;
    }

    /**
     * @param string $func
     * @param array $args
     *
     * @return \PHPUnit_Framework_Constraint
     */
    protected function call($name, array $args)
    {
        $constraint = call_user_func_array($name, $args);
        return $constraint;
    }

    /**
     * @param \PHPUnit_Framework_Constraint $cons
     */
    protected function assertThat(\PHPUnit_Framework_Constraint $constraint)
    {
        if ($this->not)
        {
            $constraint = Assert::logicalNot($constraint);
        }

        $this->list[] = $constraint;
    }

    /**
     * @return AssertChain
     */
    public function not()
    {
        $this->not = true;
        return $this;
    }

    /**
     * @return AssertChain
     */
    public function be()
    {
        $this->not = false;
        return $this;
    }

    /**
     * @return AssertChain
     */
    public function and_()
    {
        $opr = new \PHPUnit_Framework_Constraint_And();

        if ($this->opr instanceof \PHPUnit_Framework_Constraint_And)
        {
            // ブロックを閉じる
            $this->end_();
        }

        if ($this->opr)
        {
            // ブロックのネスト
            $this->stack[] = array($this->opr, $this->list);
        }

        $this->opr = $opr;
        $this->list = array();

        return $this;
    }

    /**
     * @return AssertChain
     */
    public function or_()
    {
        $opr = new \PHPUnit_Framework_Constraint_Or();

        if ($this->opr instanceof \PHPUnit_Framework_Constraint_Or)
        {
            // ブロックを閉じる
            $this->end_();
        }

        if ($this->opr)
        {
            // ブロックのネスト
            $this->stack[] = array($this->opr, $this->list);
        }

        $this->opr = $opr;
        $this->list = array();

        return $this;
    }

    /**
     * @return AssertChain
     */
    public function end_()
    {
        $this->opr->setConstraints($this->list);

        if ($this->stack)
        {
            list ($opr, $list) = array_pop($this->stack);

            $list[] = $this->opr;

            $this->opr = $opr;
            $this->list = $list;
        }
        else
        {
            Assert::fail("Invalid assertion end.");
        }

        return $this;
    }

    public function __destruct()
    {
        while ($this->stack)
        {
            $this->end_();
        }

        $this->opr->setConstraints($this->list);

        Assert::assertThat($this->val, $this->opr);
    }
}
