<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnitHelper;

/**
 * @author ngyuki
 */
trait AssertTrait
{
    public static function given($val)
    {
        Initializer::init();
        return new AssertChain($val);
    }
}
