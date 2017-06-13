<?php

namespace NikosGlikis\Object0rPhpHelpers\Helpers;

class EnvironmentHelper
{
    static function isCommandLineInterface()
    {
        return (php_sapi_name() === 'cli');
    }

    /**
     * Returns the api in case that is set.
     * if $allowPrivate is false return all ips, event 127.0.0.1 and 192.168.1.1
     */
    static function getIpAddress($allowPrivate = true)
    {
        if ($allowPrivate)
        {
            $options = null;
        }
        else
        {
            $options = FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE;
        }

        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
        {
            if (array_key_exists($key, $_SERVER) === true)
            {
                foreach (explode(',', $_SERVER[$key]) as $ip)
                {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, $options) !== false)
                    {
                        return $ip;
                    }
                }
            }
        }
        return false;
    }
}