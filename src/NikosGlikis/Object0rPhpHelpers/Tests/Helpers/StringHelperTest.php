<?php
namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\ArrayHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\StringHelper;
use PHPUnit_Framework_TestCase;

class StringHelperTest extends PHPUnit_Framework_TestCase
{
    function testStringContainsHelper()
    {
        $this->assertTrue(StringHelper::stringContains('this is some test.', 'is '));
        $this->assertTrue(StringHelper::stringContains('this is some test.', 'this'));
        $this->assertFalse(StringHelper::stringContains('this is some test.', 'thiS'));
        $this->assertTrue(StringHelper::stringContains('this is some test.', 'test.'));
        $this->assertFalse(StringHelper::stringContains('this is some test.', 'tEst.'));
        $this->assertFalse(StringHelper::stringContains('this is some test.', 'test,'));

        $this->assertTrue(StringHelper::stringContains('this is some test.', 'iS ', true));
        $this->assertFalse(StringHelper::stringContains('this is sOme test.', 'some'));

        $this->assertTrue(StringHelper::stringContains('this is sOme test.', 'some', true));

        $this->assertTrue(StringHelper::stringContains('this is some test.', 'test.'));
        $this->assertFalse(StringHelper::stringContains('this is some test.', 'test,'));
    }

    function testCutToKeywords()
    {
        $text = StringHelper::cutToKeywords('My fox is blue and my light is white', array('blue', 'light'));
        $text = StringHelper::cutToKeywords('My fox is blue and my light is white', array('blue', 'light', ' '));

        $this->assertEquals($text, ' is white ');
    }
}