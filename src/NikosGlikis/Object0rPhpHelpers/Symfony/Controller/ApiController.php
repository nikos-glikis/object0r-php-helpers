<?php

namespace NikosGlikis\Object0rPhpHelpers\Symfony\Controller;

/**
 * This Controller disables file session handling so that calls do not delay when simultaneous.
 *
 * Class ApiController
 * @package NikosGlikis\Object0rPhpHelpers\Symfony\Controller
 */
class ApiController extends CustomSymfonyController
{
    /**
     * Perform some operations after controller initialized and container set.
     */
    protected function containerInitialized()
    {
        var_dump('child');
        parent::containerInitialized();
        session_write_close();
    }
}

?>