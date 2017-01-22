<?php
namespace NikosGlikis\Object0rPhpHelpers\Helpers;

class ArrayHelper
{
    /**
     * Deep sorts an array. Losses keys. Does not work well with hash maps
     * Edits original array.
     *
     * @param array $array
     */
    public static function sortNestedArray(array &$array)
    {
        sort($array);
        for ($i = 0; $i < count($array); $i++)
        {
            if (is_array($array[$i]))
            {
                self::sortNestedArray($array[$i]);
            }
        }
    }

    /**
     * Gives a hash for the array.
     * If sort is true, then the array is sorted first. Does not change origin original array.
     * Finally it takes into account only values, ignores keys.
     *
     * @param array $array
     * @param bool $sort
     * @return string
     */
    public static function getArrayHash(array &$array, $sort = false)
    {
        if ($sort)
        {
            ArrayHelper::sortNestedArray($array);
        }

        return md5(json_encode($array));
    }
}

?>