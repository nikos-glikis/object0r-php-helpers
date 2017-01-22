<?php
namespace NikosGlikis\Object0rPhpHelpers\Tests\Verifier;

use NikosGlikis\Object0rPhpHelpers\Helpers\Verifier;
use PHPUnit_Framework_TestCase;

class VerifierTest extends PHPUnit_Framework_TestCase
{
    public function testIsArrayFullOf()
    {
        $array = array();
        $array[] = new DerivedClass();
        $array[] = new DerivedClass();

        // Assert
        $this->assertEquals(true, Verifier::isArrayFullOf($array, DerivedClass::class));
        $this->assertEquals(true, Verifier::isArrayFullOf($array, BaseClass::class));
        $this->assertEquals(false, Verifier::isArrayFullOf($array, BaseClass::class, false));

        $array = array();
        $array[] = new DerivedClass();
        $array[] = new BaseClass();
        $this->assertEquals(false, Verifier::isArrayFullOf($array, DerivedClass::class));
        $this->assertEquals(true, Verifier::isArrayFullOf($array, BaseClass::class));
        $this->assertEquals(false, Verifier::isArrayFullOf($array, BaseClass::class, false));

        $array = array();
        $array[] = new DerivedClass();
        $array[] = 'dfs';
        $this->assertEquals(false, Verifier::isArrayFullOf($array, DerivedClass::class));
        $this->assertEquals(false, Verifier::isArrayFullOf($array, BaseClass::class));
        $this->assertEquals(false, Verifier::isArrayFullOf($array, BaseClass::class, false));
    }
}