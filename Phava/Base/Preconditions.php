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
            throw new IllegalArgumentException($errorMessage);
        }
    }

    /**
     * Ensures the truth of an expression involving the state of the calling
     * instance, but not involving any parameters to the calling method.
     *
     * @param string $expression
     * @param string $errorMessage
     *            optional
     * @throws IllegalStateException if $expression is false
     */
    public static function checkState($expression, $errorMessage = null)
    {
        if (! $expression) {
            throw new IllegalStateException($errorMessage);
        }
    }
}