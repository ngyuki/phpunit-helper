<?php
namespace Test\Constraint;

use ngyuki\PHPUnitHelper\Constraint\Chain;

class ChainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $c = new Chain();
        assertThat(null, $c->isEmpty()->isNull());
    }

    /**
     * @test
     */
    public function not()
    {
        $c = new Chain();
        assertThat(1, $c->not()->equalTo(2)->equalTo(1)->not()->isEmpty());
    }

    /**
     * @test
     */
    public function or_()
    {
        $c = new Chain();
        assertThat(1, $c->equalTo(2)->logicalOr()->equalTo(1));
        assertThat(2, $c->equalTo(1)->logicalOr()->equalTo(2));
    }

    /**
     * @test
     */
    public function or_not()
    {
        $c = new Chain();
        assertThat(1, $c->equalTo(2)->logicalOr()->not()->equalTo(3));
        assertThat(1, $c->not()->equalTo(3)->logicalOr()->equalTo(2));
    }
}
