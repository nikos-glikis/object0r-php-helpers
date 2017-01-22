<?php
namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\ArrayHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\StringHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\Verifier;
use NikosGlikis\Object0rPhpHelpers\Math\StatisticsHelper;
use NikosGlikis\Object0rPhpHelpers\Tests\Verifier\VerifierTest;
use PHPUnit_Framework_TestCase;

class StatisticsHelpersTest extends PHPUnit_Framework_TestCase
{
    function testStatistics()
    {
        $variation = StatisticsHelper::calculateStandardDeviation(array(12, 3, 23));
        $this->assertEquals($variation, 8.1785627642569);
        $variation = StatisticsHelper::calculateStandardDeviation(array(12, 3, 23), true);
        $this->assertEquals($variation, 10.016652800877813);
        /*$variation = StatisticsHelper::calculateStandardDeviation(array(), true);
        $this->assertEquals($variation, false);
        $variation = StatisticsHelper::calculateStandardDeviation(array(1), true);
        $this->assertEquals($variation, false);*/
    }
}