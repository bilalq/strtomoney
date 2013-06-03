<?php

use \StrToMoney\Exceptions\IllegalMutationException;

class IllegalMutationExceptionTest extends PHPUnit_Framework_TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists('\StrToMoney\Exceptions\IllegalMutationException'));
    }

    /**
     * @expectedException \StrToMoney\Exceptions\IllegalMutationException
     */
    public function testCanBeThrown() {
        throw new IllegalMutationException('key', 'val');
    }

}
