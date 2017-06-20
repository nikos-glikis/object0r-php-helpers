<?php

namespace NikosGlikis\Object0rPhpHelpers\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * This controller contains some code for measuring memory and load time (Only for controller)
 * and provides a good way to extend symfony Controllers.
 *
 * Class CustomSymfonyController
 * @package NikosGlikis\Object0rPhpHelpers\Symfony\Controller
 */
class CustomSymfonyController extends Controller
{
    private $_boot_time;
    private $_boot_memory;

    /**
     * Override method to call #containerInitialized method when container set.
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->containerInitialized();

    }

    /**
     * Perform some operations after controller initialized and container set.
     */
    protected function containerInitialized()
    {
        $this->_boot_time = microtime(TRUE);
        $this->_boot_memory = memory_get_usage();
    }

    function _getDebug()
    {
        return
            [
                'time' => $this->_getCurrentTime(),
                'total_time' => $this->_getTotalTime(),
                'memory' => $this->_getCurrentMemory(),
                'total_memory' => $this->_getTotalMemory(),
            ];
    }

    function _getCurrentTime()
    {
        return microtime(TRUE) - $this->_boot_time;
    }

    function _getCurrentMemory()
    {
        return memory_get_usage() - $this->_boot_memory;
    }

    function _getTotalMemory()
    {
        return memory_get_usage();
    }

    function _getTotalTime()
    {
        return microtime(TRUE) - $_SERVER['REQUEST_TIME_FLOAT'];
    }
}

?>