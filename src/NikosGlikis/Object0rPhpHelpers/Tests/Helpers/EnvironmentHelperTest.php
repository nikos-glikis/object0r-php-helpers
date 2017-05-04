<?php

namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\ArrayHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\EnvironmentHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\StringHelper;
use PHPUnit_Framework_TestCase;

class EnvironmentHelperTest extends PHPUnit_Framework_TestCase
{
    function testCli()
    {
        $this->assertTrue(EnvironmentHelper::isCommandLineInterface());
    }
}