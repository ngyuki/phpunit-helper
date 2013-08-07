<?php
namespace Test;

use ngyuki\PHPUnit\Helper\Builder;

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

        $ref = new \ReflectionClass('ngyuki\\PHPUnit\\Helper\\AssertChain');
        $exp = file_get_contents($ref->getFileName());

        assertEquals($exp, $out);
    }
}
