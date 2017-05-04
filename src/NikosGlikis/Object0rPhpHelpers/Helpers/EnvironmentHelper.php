<?php

namespace NikosGlikis\Object0rPhpHelpers\Helpers;

use PHPUnit_Framework_TestCase;

class EnvironmentHelper extends PHPUnit_Framework_TestCase
{
    static function isCommandLineInterface()
    {
        return (php_sapi_name() === 'cli');
    }
}