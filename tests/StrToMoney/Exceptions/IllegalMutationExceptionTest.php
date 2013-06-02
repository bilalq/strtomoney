<?php

use StrToMoney\Exceptions\IllegalMutationException;

class IllegalMutationExceptionTest extends PHPUnit_Framework_TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists('IllegalMutationException'));
    }

}
