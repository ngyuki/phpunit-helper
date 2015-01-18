<?php
namespace Test;

use ngyuki\PHPUnitHelper\Builder;

/**
 * @author ngyuki
 */
class BuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function generated_()
    {
        $obj = new Builder();
        $out = $obj->generate();

        $ref = new \ReflectionClass('ngyuki\\PHPUnitHelper\\AssertChain');
        $exp = file_get_contents($ref->getFileName());

        assertEquals($exp, $out);
    }
}
