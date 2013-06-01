<?php

use \Mockery as m;
use StrToMoney\Currencies\Currency;

class CurrencyTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->currency = m::mock('Currency');
    }

    public function tearDown() {
        m::close();
    }

    public function testExists() {
        $this->assertNotNull($this->currency);
    }

}
