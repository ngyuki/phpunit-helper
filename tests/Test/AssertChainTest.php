<?php
namespace Test;

use ngyuki\PHPUnit\Helper\AssertThat;

/**
 * @author ngyuki
 */
class AssertChainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function equalTo_()
    {
        AssertThat::given(123)->equalTo(123);
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @expectedExceptionMessage not equal
     */
    function equalTo_fail()
    {
        AssertThat::given(123)->equalTo("not equal");
    }

    /**
     * @test
     */
    function arrayHasKey_()
    {
        $a = array('a' => 1, 'b' => 2, 'c' => 3);
        AssertThat::given($a)->arrayHasKey('a')->arrayHasKey('b')->arrayHasKey('c');
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @expectedExceptionMessage not has key
     */
    function arrayHasKey_fail()
    {
        $a = array('a' => 1, 'b' => 2, 'c' => 3);
        AssertThat::given($a)->arrayHasKey('a')->arrayHasKey('b')->arrayHasKey('not has key');
    }

    /**
     * @test
     */
    function trace_()
    {
        $ref = new \ReflectionClass(AssertThat::given(null));
        $it = new \FilesystemIterator(dirname($ref->getFileName()));

        try
        {
            AssertThat::given(false)->isTrue();
            throw new \Exception("!!!");
        }
        catch (\PHPUnit_Framework_AssertionFailedError $ex)
        {
            $trace = \PHPUnit_Util_Filter::getFilteredStacktrace($ex);

            assertContains(basename(__FILE__), $trace);

            foreach ($it as $file)
            {
                $file instanceof \SplFileInfo;
                assertNotContains($file->getBasename(), $trace);
            }
        }
    }

    /**
     * @test
     */
    function selectCount_()
    {
        $val = '
            <html><body>
                <br>
                <br id="x">
                <br class="a">
                <br class="a">
            </body></html>
        ';

        AssertThat::given($val)
            ->selectCount('br', 4)
            ->selectCount('#x', 1)
            ->selectCount('.a', 2)
            ->selectCount('div', 0)
        ;
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     * @dataProvider selectCount_fail_d
     */
    function selectCount_fail($selector, $count)
    {
        $val = '
            <html><body>
                <br>
                <br id="x">
                <br class="a">
                <br class="a">
            </body></html>
        ';

        AssertThat::given($val)->selectCount($selector, $count);
    }

    function selectCount_fail_d()
    {
        return array(
            array('br', 5),
            array('#x', 2),
            array('.a', 1),
            array('div', 9),
        );
    }

    /**
     * @test
     */
    function selectEquals_()
    {
        $val = '
            <html><body>
                <div>hoge</div>
            </body></html>
        ';

        AssertThat::given($val)
            ->selectEquals('div', "hoge")
        ;
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     */
    function selectEquals_fail()
    {
        $val = '
            <html><body>
                <div>hoge</div>
            </body></html>
        ';

        AssertThat::given($val)
            ->selectEquals('div', "xxxx")
        ;
    }

    /**
     * @test
     */
    function selectRegExp_()
    {
        $val = '
            <html><body>
                <div>123</div>
            </body></html>
        ';

        AssertThat::given($val)->selectRegExp('div', '/[0-9]+/');
    }

    /**
     * @test
     * @expectedException PHPUnit_Framework_AssertionFailedError
     */
    function selectRegExp_fail()
    {
        $val = '
            <html><body>
                <div>abc</div>
            </body></html>
        ';

        AssertThat::given($val)->selectRegExp('div', '/[0-9]+/');
    }
}