<?php
/**
 * @author ngyuki
 */

namespace ngyuki\PHPUnit\Helper;

use ngyuki\PHPUnit\Helper\Constraint;

/**
 * @author ngyuki
 */
abstract class Assert extends \PHPUnit_Framework_Assert
{
    /**
     * ignore generate
     */
    public static function logicalAnd()
    {
        return call_user_func_array(array(get_parent_class(), __FUNCTION__), func_get_args());
    }

    /**
     * ignore generate
     */
    public static function logicalOr()
    {
        return call_user_func_array(array(get_parent_class(), __FUNCTION__), func_get_args());
    }

    /**
     * ignore generate
     */
    public static function logicalNot(\PHPUnit_Framework_Constraint $constraint)
    {
        return call_user_func_array(array(get_parent_class(), __FUNCTION__), func_get_args());
    }

    /**
     * ignore generate
     */
    public static function logicalXor()
    {
        return call_user_func_array(array(get_parent_class(), __FUNCTION__), func_get_args());
    }

    /**
     * ignore generate
     */
    public static function anything()
    {
        return call_user_func_array(array(get_parent_class(), __FUNCTION__), func_get_args());
    }

    /**
     * @param array   $selector
     * @param integer $count
     * @param boolean $isHtml
     *
     * @return PHPUnit_Framework_Constraint_Callback
     */
    public static function selectCount($selector, $count, $isHtml = true)
    {
        return new Constraint\Callback(function($actual) use ($selector, $count, $isHtml) {
            self::assertSelectCount($selector, $count, $actual, '', $isHtml);
            return true;
        });
    }

    /**
     * @param array   $selector
     * @param string  $content
     * @param integer $count
     * @param boolean $isHtml
     *
     * @return PHPUnit_Framework_Constraint_Callback
     */
    public static function selectEquals($selector, $content, $count = true, $isHtml = true)
    {
        return new Constraint\Callback(function($actual) use ($selector, $content, $count, $isHtml) {
            self::assertSelectEquals($selector, $content, $count, $actual, '', $isHtml);
            return true;
        });
    }

    /**
     * @param array   $selector
     * @param string  $pattern
     * @param integer $count
     * @param boolean $isHtml
     *
     * @return PHPUnit_Framework_Constraint_Callback
     */
    public static function selectRegExp($selector, $pattern, $count = true, $isHtml = true)
    {
        return new Constraint\Callback(function($actual) use ($selector, $pattern, $count, $isHtml) {
            self::assertSelectRegExp($selector, $pattern, $count, $actual, '', $isHtml);
            return true;
        });
    }
}
