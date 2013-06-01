<?php

use \Mockery as m;
use StrToMoney\Currencies\Dollar;

class DollarTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->dollar = m::mock('Dollar');
    }

    public function tearDown() {
        m::close();
    }

    public function testSubUnitRepresentation() {
        $dollar = new Dollar(3, 4);
        $this->assertEquals('04', $dollar->subUnitRepresentation());

        $dollar = new Dollar(3, 30);
        $this->assertEquals('30', $dollar->subUnitRepresentation());

        $dollar = new Dollar(3, 0);
        $this->assertEquals('00', $dollar->subUnitRepresentation());
    }

    public function testStringCasting() {
        $dollar = new Dollar(4, 40);
        $this->assertEquals('$4.40', strval($dollar));

        $dollar = new Dollar(4, 4);
        $this->assertEquals('$4.04', strval($dollar));

        $dollar = new Dollar(0, 0);
        $this->assertEquals('$0.00', strval($dollar));

        $dollar = new Dollar(1000, 0);
        $this->assertEquals('$1000.00', strval($dollar));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNegativeDollars() {
        $dollar = new Dollar(-10, 3);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNegativeCents() {
        $dollar = new Dollar(10, -3);
    }

}