<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnit\Helper;

/**
 * @author ngyuki
 */
abstract class AssertThat
{
    public static function given($val)
    {
        Initializer::init();
        return new AssertChain($val);
    }
}
