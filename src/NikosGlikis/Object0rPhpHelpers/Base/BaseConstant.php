<?php
namespace NikosGlikis\Object0rPhpHelpers\Base;

use ReflectionClass;

/**
 * Class BaseConstant
 */
class BaseConstant
{
    public static function getValid()
    {
        $oClass = new ReflectionClass(get_called_class());
        return $oClass->getConstants();
    }
    
    public static function isValid($value)
    {
        if (in_array($value, self::getValid()))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}