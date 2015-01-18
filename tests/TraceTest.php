<?php
namespace Test;

use ngyuki\PHPUnitHelper\AssertThat;

class TraceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function trace_()
    {
        $ref = new \ReflectionClass(AssertThat::given(null));
        $it = new \FilesystemIterator(dirname($ref->getFileName()));

        try {
            AssertThat::given(false)->isTrue();
            throw new \Exception("!!!");
        } catch (\PHPUnit_Framework_AssertionFailedError $ex) {
            $trace = \PHPUnit_Util_Filter::getFilteredStacktrace($ex);

            assertContains(basename(__FILE__), $trace);

            /* @var $file $file */
            foreach ($it as $file) {
                assertNotContains($file->getBasename(), $trace);
            }
        }
    }
}
