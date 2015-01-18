<?php
/**
 * This file is generated from PHPUnit_Framework_Assert.
 *
 * @author ngyuki
 */

namespace ngyuki\PHPUnitHelper;

/**
 * @author ngyuki
 */
class AssertChain extends AssertChainBase
{
    /**
     * @param array   $selector
     * @param integer $count
     * @param boolean $isHtml
     *
     * @return AssertChain
     */
    public function selectCount($selector, $count, $isHtml = true)
    {
        $this->assertThat(call_user_func_array(
            'ngyuki\PHPUnitHelper\Assertion::selectCount', func_get_args()
        ));
        return $this;
    }

    /**
     * @param array   $selector
     * @param string  $content
     * @param integer $count
     * @param boolean $isHtml
     *
     * @return AssertChain
     */
    public function selectEquals($selector, $content, $count = true, $isHtml = true)
    {
        $this->assertThat(call_user_func_array(
            'ngyuki\PHPUnitHelper\Assertion::selectEquals', func_get_args()
        ));
        return $this;
    }

    /**
     * @param array   $selector
     * @param string  $pattern
     * @param integer $count
     * @param boolean $isHtml
     *
     * @return AssertChain
     */
    public function selectRegExp($selector, $pattern, $count = true, $isHtml = true)
    {
        $this->assertThat(call_user_func_array(
            'ngyuki\PHPUnitHelper\Assertion::selectRegExp', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsTrue matcher object.
     *
     * @return AssertChain
     * @since  Method available since Release 3.3.0
     */
    public function isTrue()
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isTrue', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Callback matcher object.
     *
     * @param callable $callback
     * @return AssertChain
     */
    public function callback($callback)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::callback', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsFalse matcher object.
     *
     * @return AssertChain
     * @since  Method available since Release 3.3.0
     */
    public function isFalse()
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isFalse', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsJson matcher object.
     *
     * @return AssertChain
     * @since  Method available since Release 3.7.20
     */
    public function isJson()
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isJson', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsNull matcher object.
     *
     * @return AssertChain
     * @since  Method available since Release 3.3.0
     */
    public function isNull()
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isNull', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Attribute matcher object.
     *
     * @param  PHPUnit_Framework_Constraint $constraint
     * @param  string                       $attributeName
     * @return AssertChain
     * @since  Method available since Release 3.1.0
     */
    public function attribute(\PHPUnit_Framework_Constraint $constraint, $attributeName)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::attribute', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_TraversableContains matcher
     * object.
     *
     * @param  mixed   $value
     * @param  boolean $checkForObjectIdentity
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function contains($value, $checkForObjectIdentity = true)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::contains', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
     * object.
     *
     * @param  string $type
     * @return AssertChain
     * @since  Method available since Release 3.1.4
     */
    public function containsOnly($type)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::containsOnly', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
     * object.
     *
     * @param string $classname
     * @return AssertChain
     */
    public function containsOnlyInstancesOf($classname)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::containsOnlyInstancesOf', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_ArrayHasKey matcher object.
     *
     * @param  mixed $key
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function arrayHasKey($key)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::arrayHasKey', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object.
     *
     * @param  mixed   $value
     * @param  float   $delta
     * @param  integer $maxDepth
     * @param  boolean $canonicalize
     * @param  boolean $ignoreCase
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function equalTo($value, $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::equalTo', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object
     * that is wrapped in a PHPUnit_Framework_Constraint_Attribute matcher
     * object.
     *
     * @param  string  $attributeName
     * @param  mixed   $value
     * @param  float   $delta
     * @param  integer $maxDepth
     * @param  boolean $canonicalize
     * @param  boolean $ignoreCase
     * @return AssertChain
     * @since  Method available since Release 3.1.0
     */
    public function attributeEqualTo($attributeName, $value, $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::attributeEqualTo', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsEmpty matcher object.
     *
     * @return AssertChain
     * @since  Method available since Release 3.5.0
     */
    public function isEmpty()
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isEmpty', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_FileExists matcher object.
     *
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function fileExists()
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::fileExists', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_GreaterThan matcher object.
     *
     * @param  mixed $value
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function greaterThan($value)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::greaterThan', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
     * a PHPUnit_Framework_Constraint_IsEqual and a
     * PHPUnit_Framework_Constraint_GreaterThan matcher object.
     *
     * @param  mixed $value
     * @return AssertChain
     * @since  Method available since Release 3.1.0
     */
    public function greaterThanOrEqual($value)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::greaterThanOrEqual', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_ClassHasAttribute matcher object.
     *
     * @param  string $attributeName
     * @return AssertChain
     * @since  Method available since Release 3.1.0
     */
    public function classHasAttribute($attributeName)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::classHasAttribute', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_ClassHasStaticAttribute matcher
     * object.
     *
     * @param  string $attributeName
     * @return AssertChain
     * @since  Method available since Release 3.1.0
     */
    public function classHasStaticAttribute($attributeName)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::classHasStaticAttribute', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_ObjectHasAttribute matcher object.
     *
     * @param  string $attributeName
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function objectHasAttribute($attributeName)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::objectHasAttribute', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsIdentical matcher object.
     *
     * @param  mixed $value
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function identicalTo($value)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::identicalTo', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsInstanceOf matcher object.
     *
     * @param  string $className
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function isInstanceOf($className)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isInstanceOf', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsType matcher object.
     *
     * @param  string $type
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function isType($type)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::isType', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_LessThan matcher object.
     *
     * @param  mixed $value
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function lessThan($value)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::lessThan', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
     * a PHPUnit_Framework_Constraint_IsEqual and a
     * PHPUnit_Framework_Constraint_LessThan matcher object.
     *
     * @param  mixed $value
     * @return AssertChain
     * @since  Method available since Release 3.1.0
     */
    public function lessThanOrEqual($value)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::lessThanOrEqual', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_PCREMatch matcher object.
     *
     * @param  string $pattern
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function matchesRegularExpression($pattern)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::matchesRegularExpression', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringMatches matcher object.
     *
     * @param  string $string
     * @return AssertChain
     * @since  Method available since Release 3.5.0
     */
    public function matches($string)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::matches', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringStartsWith matcher object.
     *
     * @param  mixed $prefix
     * @return AssertChain
     * @since  Method available since Release 3.4.0
     */
    public function stringStartsWith($prefix)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::stringStartsWith', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringContains matcher object.
     *
     * @param  string  $string
     * @param  boolean $case
     * @return AssertChain
     * @since  Method available since Release 3.0.0
     */
    public function stringContains($string, $case = true)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::stringContains', func_get_args()
        ));
        return $this;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringEndsWith matcher object.
     *
     * @param  mixed $suffix
     * @return AssertChain
     * @since  Method available since Release 3.4.0
     */
    public function stringEndsWith($suffix)
    {
        $this->assertThat(call_user_func_array(
            'PHPUnit_Framework_Assert::stringEndsWith', func_get_args()
        ));
        return $this;
    }
}
