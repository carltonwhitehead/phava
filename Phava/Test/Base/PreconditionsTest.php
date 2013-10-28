<?php
namespace Phava\Test\Base;

use Phava\Base\Preconditions;

class PreconditionsTest extends \PHPUnit_Framework_TestCase
{

    const ILLEGAL_ARGUMENT_EXCEPTION = '\\Phava\\Exception\\IllegalArgumentException';

    public function testCheckArgumentWithTrue() {
        try {
            Preconditions::checkArgument(true);
        } catch (Exception $unexpected) {
            $this->fail('Preconditions::checkArgument threw an exception when passed true');
        }
    }

    public function testCheckArgumentWithFalse() {
        $this->setExpectedException(self::ILLEGAL_ARGUMENT_EXCEPTION);
        Preconditions::checkArgument(false);
    }

    /**
     * @param string $message
     *
     * @dataProvider providerExceptionMessage
     */
    public function testCheckArgumentWithFalseAndMessage($message) {
        $this->setExpectedException(self::ILLEGAL_ARGUMENT_EXCEPTION, $message);
        Preconditions::checkArgument(false, $message);
    }

    public function providerExceptionMessage() {
        return array(
        	array(""),
            array("custom exception message from the test code"),
            array(0),
            array("0")
        );
    }

    /**
     * @param integer $var
     *
     * @dataProvider providerIntegers
     */
    public function testCheckArgumentIsIntegerWithIntegers($var) {
        try {
            Preconditions::checkArgumentIsInteger($var);
        } catch (Exception $unexpected) {
            $this->fail('Preconditions::checkArgumentIsInteger threw unexpectedly');
        }
    }

    public function providerIntegers() {
        return array(
        	array(0),
            array(1),
            array(-1)
        );
    }

    /**
     * @param mixed $var
     *
     * @dataProvider providerNonInteger
     */
    public function testCheckArgumentIsIntegerWithNonInteger($var) {
        $this->setExpectedException(self::ILLEGAL_ARGUMENT_EXCEPTION);
        Preconditions::checkArgumentIsInteger($var);
    }

    public function providerNonInteger() {
        return array(
            array(""),
            array("0"),
            array("1"),
            array("-1"),
            array(null),
            array(0.1)
        );
    }

    /**
     * @param mixed $var
     *
     * @dataProvider providerExceptionMessage
     */
    public function testCheckArgumentIsIntegerWithNonIntegerAndMessage($message) {
        $this->setExpectedException(self::ILLEGAL_ARGUMENT_EXCEPTION, $message);
        Preconditions::checkArgumentIsInteger("0", $message);
    }

    /**
     * @param mixed $key
     * @param array $array
     *
     * @dataProvider providerKeyAndArrayWithCorrectValues
     */
    public function testCheckArgumentIsKeyInArrayWithCorrectValues($key, $array) {
        try {
            Preconditions::checkArgumentIsKeyInArray($key, $array);
        } catch (\Exception $unexpected) {
            $this->fail('Preconditions::checkArgumentIsKeyInArray threw unexpectedly');
        }
    }

    public function providerKeyAndArrayWithCorrectValues() {
        return array(
        	array('a', array('b' => 'b', 'c' => 'd', 'a' => null, 'z' => null)),
            array('b', array('c' => 'b', 'b' => 'a', 'a' => 'z')),
            array('only', array('only' => 'only')),
            array(0, array(42)),
            array(2, array(0 => 42, 2 => -42))
        );
    }

    /**
     * @param mixed $key
     * @param array $array
     *
     * @dataProvider providerKeyAndArrayWithIncorrectValues
     */
    public function testCheckArgumentIsKeyInArrayWithIncorrectValues($key, $array) {
        $this->setExpectedException(self::ILLEGAL_ARGUMENT_EXCEPTION);
        Preconditions::checkArgumentIsKeyInArray($key, $array);
    }

    public function providerKeyAndArrayWithIncorrectValues() {
        return array(
        	array(0, array(1 => 42)),
            array('asdf', array(1 => 42)),
            array('asdf',array('jkl' => null))
        );
    }

    /**
     * @param mixed $message
     *
     * @dataProvider providerExceptionMessage
     */
    public function testCheckArgumentIsKeyInArrayWithIncorrectValuesAndMessage($message) {
        $this->setExpectedException(self::ILLEGAL_ARGUMENT_EXCEPTION, $message);
        Preconditions::checkArgumentIsKeyInArray(1, array(0), $message);
    }
}