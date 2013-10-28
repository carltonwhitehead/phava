<?php
namespace Phava\Base;

use Phava\Exception\IllegalArgumentException;
use Phava\Exception\IllegalStateException;

class Preconditions
{

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
            $defaultError = 'argument did not satisfy precondition';
            throw new IllegalArgumentException(
                is_null($errorMessage)
                ? $defaultError : $errorMessage
            );
        }
    }

    /**
     * Ensures the argument passed to the calling method is an integer.
     *
     * @param unknown $argument
     * @param string $errorMessage
     */
    public static function checkArgumentIsInteger($argument, $errorMessage = null)
    {
        if (! is_integer($argument)) {
            $defaultError = '$argument was not an integer';
            throw new IllegalArgumentException(
                is_null($errorMessage)
                ? $defaultError : $errorMessage
            );
        }
    }

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
            $defaultError = '$argument is not a key in $array';
            throw new IllegalArgumentException(
                is_null($errorMessage)
                ? $defaultError : $errorMessage
            );
        }
    }

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
            $defaultError = 'instance state did not satisfy precondition';
            throw new IllegalStateException(
                is_null($errorMessage)
                ? $defaultError : $errorMessage
            );
        }
    }
}