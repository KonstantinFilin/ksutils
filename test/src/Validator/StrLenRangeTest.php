<?php

namespace KsUtils\Validator;

require_once realpath(dirname(__FILE__) . "/../../../src") . "/Validator.php";
require_once realpath(dirname(__FILE__) . "/../../../src") . "/Validator/StrLenRange.php";

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-05 at 15:14:58.
 */
class StrLenRangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var StrLenRange
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new StrLenRange(3, 7);
    }

    /**
     * @covers KsUtils\Validator\StrLenRange::check()
     */
    public function testCheck()
    {
        $this->assertFalse($this->object->check(""));
        $this->assertFalse($this->object->check("a"));
        $this->assertFalse($this->object->check("ab"));
        $this->assertTrue($this->object->check("abc"));
        $this->assertTrue($this->object->check("abcdefg"));
        $this->assertFalse($this->object->check("abcdefgh"));
        $this->assertFalse($this->object->check("abcdefghi"));
        $this->assertFalse($this->object->check(true));
        $this->assertFalse($this->object->check(false));
        $this->assertFalse($this->object->check(new \stdClass()));

        $this->assertEquals(
            "Must be string with length between 3 and 7 chars, checked value: ab",
            $this->object->getError("ab")
        );
    }
}