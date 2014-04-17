<?php

    namespace KsUtils;
    require_once realpath(dirname(__FILE__) . "/../../../src/KsUtils") . "/Str.php";

    /**
     * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-05 at 15:14:58.
     */
    class StrTest extends \PHPUnit_Framework_TestCase
    {

        /**
         * Sets up the fixture, for example, opens a network connection.
         * This method is called before a test is executed.
         */
        protected function setUp()
        {
        }

        /**
         * Tears down the fixture, for example, closes a network connection.
         * This method is called after a test is executed.
         */
        protected function tearDown()
        {

        }

        /**
         * @covers KsUtils\Str::endsWith
         */
        public function testEndsWith()
        {
            $this->assertTrue(\KsUtils\Str::endsWith("abc", "defabc"));
            $this->assertFalse(\KsUtils\Str::endsWith("abc", "defabcd"));
        }

        /**
         * @covers KsUtils\Str::random
         */
        public function testRandomLen()
        {
            $len = 50;
            $rand = \KsUtils\Str::random($len);
            $this->assertEquals($len, strlen($rand));
        }

        /**
         * @covers KsUtils\Str::random
         */
        public function testRandomOnlyGivenChars()
        {
            $len = 50;
            $chars = array("a", "b", "c");
            $rand = \KsUtils\Str::random($len, $chars);
            $this->assertNotEmpty($rand);
            $len2 = strlen($rand);
            $this->assertEquals($len, $len);

            for($i=0; $i<$len2; $i++) {
                $ch = substr($rand, $i, 1);
                $this->assertTrue(in_array($ch, $chars));
            }

            $this->assertTrue(stristr($rand, "d") === false);
        }

        /**
         * @covers KsUtils\Str::getSubstrAfterLast
         */
        public function testGetSubstrAfterLast()
        {
            $str = "abc.def.ghi.klm";
            $this->assertEquals("klm", \KsUtils\Str::getSubstrAfterLast(".", $str));
            $this->assertNotEquals("abc", \KsUtils\Str::getSubstrAfterLast(".", $str));
            $this->assertNotEquals("ghi", \KsUtils\Str::getSubstrAfterLast(".", $str));
            $this->assertNotEquals(".", \KsUtils\Str::getSubstrAfterLast(".", $str));
        }

        /**
         * @covers KsUtils\Str::translit
         */
        public function testTranslit()
        {
            $this->assertEquals("abvgd", \KsUtils\Str::translit("абвгд"));
        }

        /**
         * @covers KsUtils\Str::slugabize
         */
        public function testSlugabize()
        {
            $source = " Пример &! названия ";
            $this->assertEquals("primer_nazvaniya", \KsUtils\Str::slugabize($source, "_"));
        }

        /**
         * @covers KsUtils\Str::jsonEncode
         */
        public function testJsonEncode()
        {
            $source = array("var1" => "def", "var2" => "abc");
            $dest = \KsUtils\Str::jsonEncode($source);
            $this->assertNotEmpty($dest);
            $this->assertEquals('{"var1":"def","var2":"abc"}', $dest);
        }

        /**
         * @covers KsUtils\Str::jsonBeautify
         */
        public function testJsonBeautify()
        {
            $source = '{var: 1, var2: def, var3: "a long string", var4: { a: aaa, b: bbb, c: ccc}}';
            $dest = \KsUtils\Str::jsonBeautify($source);
            $this->assertNotEmpty($dest);
            $this->assertEquals(
                preg_replace("|\s+|", "", $source),
                preg_replace("|\s+|", "", $dest)
            );
        }
        
        public function testUndescoresToUpperDataProvider()
        {
            return array(
                array("", ""),
                array("abc", "abc"),
                array("abcDefGhi", "abcDefGhi"),
                array("abc_def_ghi", "abcDefGhi"),
                array("abc_def_ghi_", "abcDefGhi"),
                array("_abc_def_ghi", "AbcDefGhi"),
                array("_abc_def_ghi_", "AbcDefGhi")
            );
        }
        
        public function testUpperToUndescoresDataProvider()
        {
            return array(
                array("", ""),
                array("abc", "abc"),
                array("abc_def_ghi", "abc_def_ghi"),
                array("abcDefGhi", "abc_def_ghi"),
                array("abcDefGhi_", "abc_def_ghi_"),
                array("AbcDefGhi", "_abc_def_ghi"),
            );
        }
        
        /**
         * @covers KsUtils\Str::undescoresToUpper
         * @dataProvider testUndescoresToUpperDataProvider
         */
        public function testUndescoresToUpper($input, $expected)
        {
            $this->assertEquals(
                $expected, 
                \KsUtils\Str::undescoresToUpper($input)
            );
        }
        
        /**
         * @covers KsUtils\Str::upperToUnderscores
         * @dataProvider testUpperToUndescoresDataProvider
         */
        public function testUpperToUndescores($input, $expected)
        {
            $this->assertEquals(
                $expected, 
                \KsUtils\Str::upperToUnderscores($input)
            );
        }
    }

