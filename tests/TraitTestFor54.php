<?php
namespace Test;

use ngyuki\PHPUnitHelper\AssertTrait;
use PHPUnit_Framework_AssertionFailedError;

/**
 * @author ngyuki
 */
class TraitTest extends \PHPUnit_Framework_TestCase
{
    use AssertTrait;

    /**
     * @test
     */
    function equalTo_()
    {
        self::given(123)->equalTo(123);
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @expectedExceptionMessage not equal
     */
    function equalTo_fail()
    {
        self::given(123)->equalTo("not equal");
    }
}
