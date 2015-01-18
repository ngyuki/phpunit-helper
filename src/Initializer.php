<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnitHelper;

/**
 * @author ngyuki
 */
class Initializer
{
    public static function init()
    {
        static $init = true;

        if ($init)
        {
            $init = false;

            \PHPUnit_Util_GlobalState::phpunitFiles();

            $ref = new \ReflectionMethod('PHPUnit_Util_GlobalState', 'addDirectoryContainingClassToPHPUnitFilesList');
            $ref->setAccessible(true);
            $ref->invoke(null, __CLASS__);
        }
    }
}
