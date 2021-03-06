<?php

namespace KsUtils\StrFilter;

require_once realpath(dirname(__FILE__) . "/../../../../src/KsUtils") . "/StrFilter.php";
require_once realpath(dirname(__FILE__) . "/../../../../src/KsUtils") . "/StrFilter/Phone.php";

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-05 at 15:14:58.
 */
class PhoneTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Phone;
    }

    /**
     * @covers KsUtils\StrFilter\Phone::filter()
     */
    public function testFilter()
    {
        $this->assertEquals("1234567899", $this->object->filter("(123) 456-78-99"));
        $this->assertEquals("1234567899", $this->object->filter("+7 (123) 456-78-99"));
        $this->assertEquals("1234567899", $this->object->filter("+7(123) 456-78-99"));
        $this->assertEquals("1234567899", $this->object->filter("7(123) 456-78-99"));
        $this->assertEquals("1234567899", $this->object->filter("71234567899"));
        $this->assertEquals("1234567899", $this->object->filter("+71234567899"));
        $this->assertEquals("", $this->object->filter(""));
        $this->assertEquals("", $this->object->filter("abc"));
        $this->assertEquals("", $this->object->filter("12345"));
        $this->assertEquals("", $this->object->filter("123-45-67"));
    }
}