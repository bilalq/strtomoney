<?php

use \Mockery as m;
use StrToMoney\Currencies\USD;
use StrToMoney\Exceptions\IllegalMutationException;

class USDTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->dollar = new USD(5, 12);
    }

    public function tearDown() {
        m::close();
    }

    public function testSubUnitRepresentation() {
        $dollar = new USD(3, 4);
        $this->assertEquals('04', $dollar->subUnitRepresentation());

        $dollar = new USD(3, 30);
        $this->assertEquals('30', $dollar->subUnitRepresentation());

        $dollar = new USD(3, 0);
        $this->assertEquals('00', $dollar->subUnitRepresentation());
    }

    public function testStringCasting() {
        $dollar = new USD(4, 40);
        $this->assertEquals('$4.40', strval($dollar));

        $dollar = new USD(4, 4);
        $this->assertEquals('$4.04', strval($dollar));

        $dollar = new USD(0, 0);
        $this->assertEquals('$0.00', strval($dollar));

        $dollar = new USD(1000, 0);
        $this->assertEquals('$1000.00', strval($dollar));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNegativeDollars() {
        $dollar = new USD(-10, 3);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNegativeCents() {
        $dollar = new USD(10, -3);
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfCode() {
        $this->dollar->code = 'fail';
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfSymbol() {
        $this->dollar->symbol = 'meh';
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfSubUnitSymbol() {
        $this->dollar->subUnitSymbol = 'other';
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfMainUnits() {
        $this->dollar->mainUnits = '3';
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfSubUnits() {
        $this->dollar->subUnits = '3';
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfUnitSeperator() {
        $this->dollar->unitSeperator = '|';
    }

    /**
     * @expectedException StrToMoney\Exceptions\IllegalMutationException
     */
    public function testImmutabilityOfSubUnitLimit() {
        $this->dollar->subUnitLimit = '999';
    }

}
