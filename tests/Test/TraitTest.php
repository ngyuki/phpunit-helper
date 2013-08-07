<?php
namespace Test;

use ngyuki\PHPUnit\Helper\AssertThat;
use ngyuki\PHPUnit\Helper\AssertTrait;

if (version_compare(PHP_VERSION, '5.4') >= 0)
{
    require __DIR__ . '/TraitUse.php';
}
