<?php
namespace Phava\Base;

class Strings
{

    /**
     * Returns true if the first argument is null or an empty string
     *
     * @param string|null $string
     * @return boolean true if the first argument is null or an empty string
     */
    public static function isEmpty()
    {
        $string = (string) func_get_args(0);
        return strlen($string) > 0;
    }
}
