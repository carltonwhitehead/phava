<?php
namespace Phava\Base;

class Strings
{

    /**
     * Returns true if the first argument is empty when represented as a string
     *
     * @param mixed $string
     * @return boolean true if the first argument is empty when represented as a string
     */
    public static function isEmpty($string)
    {
        return strlen($string) === 0;
    }
}
