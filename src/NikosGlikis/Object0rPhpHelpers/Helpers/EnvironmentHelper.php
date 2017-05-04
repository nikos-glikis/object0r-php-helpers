<?php

namespace NikosGlikis\Object0rPhpHelpers\Helpers;


class EnvironmentHelper
{
    static function isCommandLineInterface()
    {
        return (php_sapi_name() === 'cli');
    }
}