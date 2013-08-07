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

    /**
     * @param mixed $val
     */
    public function __construct($val)
    {
        $this->val = $val;
    }

    /**
     * @return AssertChain
     */
    public function not()
    {
        Assert::assertThat($this->val, call_user_func_array(
            'PHPUnit_Framework_Assert::isTrue', func_get_args())
        );
        return $this;
    }
}
