<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnitHelper\Constraint;

/**
 * @author ngyuki
 */
class Callback extends \PHPUnit_Framework_Constraint
{
    private $callback;
    private $message = 'is accepted by specified callback';

    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    protected function matches($other)
    {
        try
        {
            return call_user_func($this->callback, $other);
        }
        catch (\PHPUnit_Framework_AssertionFailedError $ex)
        {
            $this->message = $ex->toString();
        }
    }

    public function toString()
    {
        return $this->message;
    }
}
