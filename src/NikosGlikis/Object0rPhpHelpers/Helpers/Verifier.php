<?php

namespace NikosGlikis\Object0rPhpHelpers\Helpers;

class Verifier
{
    /**
     * Check if $array is full of $type. Can be used only for Objects
     * @param $allowDerived - If false, $array must be filled with exactly $type and not a derived class.
     * @return bool
     */
    static function isArrayFullOf(array $array, $type, $allowDerived = true)
    {
        foreach ($array as $item) {
            //TODO Primitive Types
            if (!$item instanceof $type) {
                return false;
            } else if (!$allowDerived && is_subclass_of($item, $type)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Returns true if input is valid json, false otherwise.
     *
     * @param $string
     * @return bool
     */
    public static function isValidJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

?>