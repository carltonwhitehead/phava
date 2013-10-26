<?php
namespace Phava\Base;

use Phava\Exception\IllegalArgumentException;
use Phava\Exception\IllegalStateException;

class Preconditions
{

    const ERROR_ARGUMENT = 'argument did not satisfy precondition';
    /**
     * Ensures the truth of an expression involving one or more parameters to the
     * calling method.
     *
     * @param boolean $expression
     * @param string $errorMessage
     *            optional
     * @throws IllegalArgumentException if $expression is false
     */
    public static function checkArgument($expression, $errorMessage = null)
    {
        if (! $expression) {
            throw new IllegalArgumentException(
                is_null($errorMessage)
                ? self::ERROR_ARGUMENT : $errorMessage
            );
        }
    }

    const ERROR_ARGUMENT_IS_INTEGER = '$argument was not an integer';
    /**
     * Ensures the argument passed to the calling method is an integer.
     *
     * @param unknown $argument
     * @param string $errorMessage
     */
    public static function checkArgumentIsInteger($argument, $errorMessage = null)
    {
        if (! is_integer($var)) {
            throw new IllegalArgumentException(
                is_null($errorMessage)
                ? self::ERROR_ARGUMENT_IS_INTEGER : $errorMessage
            );
        }
    }

    const ERROR_ARGUMENT_IS_KEY_IN_ARRAY = '$argument is not a key in $array';
    /**
     * Ensures the argument passed to the calling method is a key in the array
     *
     * @param mixed $argument
     * @param array $array
     * @param string $errorMessage
     * @throws IllegalArgumentException
     */
    public static function checkArgumentIsKeyInArray($argument, $array, $errorMessage = null)
    {
        if (! array_key_exists($argument, $array)) {
            throw new IllegalArgumentException(
                is_null($errorMessage)
                ? self::ERROR_ARGUMENT_IS_KEY_IN_ARRAY : $errorMessage
            );
        }
    }

    const ERROR_CHECK_STATE = 'instance state did not satisfy precondition';
    /**
     * Ensures the truth of an expression involving the state of the calling
     * instance, but not involving any parameters to the calling method.
     *
     * @param boolean $expression
     * @param string $errorMessage
     *            optional
     * @throws IllegalStateException if $expression is false
     */
    public static function checkState($expression, $errorMessage = null)
    {
        if (! $expression) {
            throw new IllegalStateException(
                is_null($errorMessage)
                ? self::ERROR_CHECK_STATE : $errorMessage
            );
        }
    }
}