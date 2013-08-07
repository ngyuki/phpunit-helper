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

            $func = function () {
                self::addDirectoryContainingClassToPHPUnitFilesList(__CLASS__);
            };

            call_user_func($func->bindTo(null, 'PHPUnit_Util_GlobalState'));
        }
    }
}
