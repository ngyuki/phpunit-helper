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
        self::init();
        return new AssertChain($val);
    }

    private static function init()
    {
        static $init = true;

        if ($init)
        {
            $init = false;

            \PHPUnit_Util_GlobalState::phpunitFiles();

            $ref = new \ReflectionMethod('PHPUnit_Util_GlobalState', 'addDirectoryContainingClassToPHPUnitFilesList');
            $ref->setAccessible(true);
            //$ref->invoke(null, __CLASS__);
        }
    }
}
