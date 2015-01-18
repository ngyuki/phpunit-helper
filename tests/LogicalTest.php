<?php
namespace Test;

use ngyuki\PHPUnitHelper\AssertThat;

/**
 * @author ngyuki
 */
class LogicalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function not_()
    {
        AssertThat::given(123)->not()->equalTo(456);
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @expectedExceptionMessage ghsartg
     */
    function not_fail()
    {
        AssertThat::given("ghsartg")->not()->equalTo("ghsartg");
    }

    /**
     * @test
     */
    function chain_()
    {
        AssertThat::given(9)
            ->not()
                ->equalTo(1)
                ->equalTo(2)
                ->equalTo(null)
                ->equalTo(false)
            ->be()
                ->equalTo(9)
        ;
    }

    /**
     * @test
     */
    function or_()
    {
        AssertThat::given(9)
            ->or_()
                ->equalTo(1)
                ->equalTo(2)
                ->equalTo(9)
            ->or_()
                ->equalTo(9)
            ->end_();
        ;
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @expectedExceptionMessage 456
     */
    function or_fail()
    {
        AssertThat::given(9)
            ->or_()
                ->equalTo(9)
            ->or_()
                ->equalTo(123)
                ->equalTo(456)
                ->equalTo(789)
        ;
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     */
    function or_fail_not()
    {
        AssertThat::given(9)
            ->or_()
                ->not()
                    ->equalTo(9)
                    ->equalTo(9)
                    ->equalTo(9)
                ->be()
                    ->equalTo(0)
        ;
    }
}
