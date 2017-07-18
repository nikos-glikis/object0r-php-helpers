<?php

namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\ArrayHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\ImageHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\StringHelper;
use PHPUnit_Framework_TestCase;

class ImageHelperTest extends PHPUnit_Framework_TestCase
{
    function testStringContainsHelper()
    {
        $tmpFileName = '/tmp/_tests_test.gif';
        ImageHelper::writeTransparentGif($tmpFileName);
        $this->assertEquals('57f187c7a868faeac558007a8eb6cb2e', md5(file_get_contents($tmpFileName)));
        $out = shell_exec('file '.$tmpFileName);
        $this->assertContains('GIF', $out);

        unlink($tmpFileName);

        $tmpFileName = '/tmp/_tests_.png';
        ImageHelper::writeTransparentPng($tmpFileName);
        $this->assertEquals('71a50dbba44c78128b221b7df7bb51f1', md5(file_get_contents($tmpFileName)));
        $out= shell_exec('file '.$tmpFileName);
        $this->assertContains('PNG', $out);
        unlink($tmpFileName);
    }
}