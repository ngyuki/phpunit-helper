<?php
namespace ngyuki\PHPUnitHelper;

class AssertChain extends Constraint\Chain
{
    protected $val;

    /**
     * @param mixed $val
     */
    public function __construct($val)
    {
        parent::__construct();
        $this->val = $val;
    }

    public function __destruct()
    {
        Assertion::assertThat($this->val, $this);
    }
}
