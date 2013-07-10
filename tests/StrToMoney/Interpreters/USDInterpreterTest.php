<?php

use StrToMoney\Interpreters\USDInterpreter;

class USDInterpreterTest extends PHPUnit_Framework_TestCase {

    public function testExists() {
        $this->assertTrue(class_exists('StrToMoney\Interpreters\USDInterpreter'));
    }

}
