<?php

namespace KsUtils\StrFilter;

require_once realpath(dirname(__FILE__) . "/../../../src") . "/StrFilter.php";
require_once realpath(dirname(__FILE__) . "/../../../src") . "/StrFilter/StripTags.php";
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-05 at 15:14:58.
 */
class StripTagsTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new StripTags;
    }

    /**
     * @covers KsUtils\StrFilter\StripTags::filter()
     */
    public function testFilter()
    {
        $this->assertEquals("", $this->object->filter(""));
        $this->assertEquals("abc", $this->object->filter("abc"));
        $this->assertEquals("abcdefg", $this->object->filter("abc<b>de</b>fg"));
        $this->assertEquals("abcdefg", $this->object->filter("abc<img alt=\"\" />defg"));
        $this->assertEquals(array("abc", "def", "ghi"), $this->object->filter(array("abc", "def", "ghi")));
        $this->assertEquals(
            array("abc", "def", "ghi"),
            $this->object->filter(array("abc", "d<b>e</b>f", "g<img src=\"test.html\" alt=\"\"/>hi")
        ));
    }
}