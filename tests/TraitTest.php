<?php
namespace Test;

use ngyuki\PHPUnitHelper\AssertThat;
use ngyuki\PHPUnitHelper\AssertTrait;

if (version_compare(PHP_VERSION, '5.4') >= 0)
{
    require __DIR__ . '/TraitUse.php';
}
