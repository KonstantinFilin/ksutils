<?php

namespace KsUtils\Validator;

require_once realpath(dirname(__FILE__) . "/../../../src") . "/Validator.php";
require_once realpath(dirname(__FILE__) . "/../../../src") . "/Validator/Phone.php";

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-05 at 15:14:58.
 */
class PhoneTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var Phone
     */
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
     * @covers KsUtils\Validator\Phone::check()
     */
    public function testCheck()
    {
        $this->assertTrue($this->object->check("1234567890"));
        $this->assertTrue($this->object->check("(915) 123-45-76"));
        $this->assertTrue($this->object->check("8(915) 123-45-76"));
        $this->assertTrue($this->object->check("8 (915) 123-45-76"));
        $this->assertTrue($this->object->check("7 (915) 123-45-76"));
        $this->assertTrue($this->object->check("+7(915) 123-45-76"));
        $this->assertTrue($this->object->check("+7 (915) 123-45-76"));
        $this->assertTrue($this->object->check("79151234576"));
        $this->assertTrue($this->object->check("89151234576"));
        $this->assertFalse($this->object->check("123456789"));
        $this->assertFalse($this->object->check("12345678901"));
        $this->assertFalse($this->object->check("abc"));
        $this->assertFalse($this->object->check(""));

        $this->assertEquals(
            "Wrong phone number format: 12345",
            $this->object->getError("12345")
        );
    }
}