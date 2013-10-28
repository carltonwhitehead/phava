<?php
namespace Phava\Test\Base;

use Phava\Base\Strings;

class StringsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param mixed $var
     *
     * @dataProvider providerEmptyStrings
     */
    public function testIsEmptyWithEmptyStrings($var)
    {
        $this->assertTrue(Strings::isEmpty($var));
    }

    public function providerEmptyStrings()
    {
        return array(
            array(""),
            array(null),
        );
    }

    /**
     * @param mixed $var
     *
     * @dataProvider providerNonEmptyStrings
     */
    public function testIsEmptyWithNonEmptyStrings($var)
    {
        $this->assertFalse(Strings::isEmpty($var));
    }

    public function providerNonEmptyStrings()
    {
        return array(
            array(" "),
            array("The quick brown fox jumps over the lazy dog"),
            array(0),
        );
    }

    /**
     * @param mixed $var
     *
     * @dataProvider providerNonEmptyStrings
     */
    public function testIsNotEmptyWithNonEmptyStrings($var)
    {
        $this->assertTrue(Strings::isNotEmpty($var));
    }

    /**
     * @param mixed $var
     *
     * @dataProvider providerEmptyStrings
     */
    public function testIsNotEmptyWithEmptyStrings($var)
    {
        $this->assertFalse(Strings::isNotEmpty($var));
    }
}