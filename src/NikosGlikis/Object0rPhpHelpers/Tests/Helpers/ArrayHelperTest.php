<?php
namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\ArrayHelper;
use PHPUnit_Framework_TestCase;

class ArrayHelperTest extends PHPUnit_Framework_TestCase
{
    function testArrayHash()
    {
        $array = array
        (
            'ok',
            array('b2', 'zed'),
            'ok1',
            'sdfsd' => 'test',
            array('z1', 'a2'),
            'ada'
        );

        $hash = ArrayHelper::getArrayHash($array);
        $this->assertEquals($hash, '3c8ad74d80dda25b705e6ef6b059e0e4');
    }

    function testNestedArray()
    {
        $array = array
        (
            'ok',
            array('b2', 'zed'),
            'ok1',
            'sdfsd' => 'test',
            array('z1', 'a2'),
            'ada'
        );

        $array2 = array
        (
            'ada',
            'ok',

            'ok1',
            'test',

            array('b2', 'zed'),
            array('a2', 'z1'),

        );

        ArrayHelper::sortNestedArray($array);

        $this->assertEquals($array, $array2);

        $array = array
        (
            'ok',
            'aok',
            'zok',
        );

        ArrayHelper::sortNestedArray($array);

        $array2 = array
        (
            'aok',
            'ok',
            'zok'
        );

        $this->assertEquals($array, $array2);


    }
}