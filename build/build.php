<?php
namespace ngyuki\PHPUnitHelper;

require __DIR__ . '/../vendor/autoload.php';

$obj = new Builder();
$obj->run();

$obj = new Constraint\Builder();
$obj->run();
