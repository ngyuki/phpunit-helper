<?php
namespace Test;

use ngyuki\PHPUnitHelper\AssertThat;
use PHPUnit_Framework_AssertionFailedError;

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
        AssertThat::given(123)->not->equalTo(456);
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @expectedExceptionMessage ghsartg
     */
    function not_fail()
    {
        AssertThat::given("ghsartg")->not->equalTo("ghsartg");
    }

    /**
     * @test
     */
    function chain_()
    {
        AssertThat::given(9)
            ->not->equalTo(1)
            ->not->equalTo(2)
            ->not->equalTo(null)
            ->not->equalTo(false)
            ->equalTo(9)
        ;
    }

    /**
     * @test
     */
    function or_()
    {
        AssertThat::given(9)
            ->not->equalTo(9)
            ->or
            ->equalTo(9)
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
            ->equalTo(123)
            ->or
            ->equalTo(456)
        ;
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     */
    function or_fail_not()
    {
        AssertThat::given(9)
            ->not->equalTo(9)
            ->or
            ->equalTo(0)
        ;
    }
}
