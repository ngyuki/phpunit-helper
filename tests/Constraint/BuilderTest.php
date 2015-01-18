<?php
namespace Test\Constraint;

use ngyuki\PHPUnitHelper\Constraint\Builder;
use ngyuki\PHPUnitHelper\Constraint\Chain;

class BuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function generated_()
    {
        $obj = new Builder();
        $out = $obj->generate();

        $ref = new \ReflectionClass(get_class(new Chain()));
        $exp = file_get_contents($ref->getFileName());

        assertEquals($exp, $out);
    }
}
