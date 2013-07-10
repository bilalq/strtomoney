<?php namespace StrToMoney\Interpreters;

class DollarInterpreter extends Interpreter {
    public function __construct() {
    }

    public function interpret($string) {
        $string = trim($string);
        $lastWord = static::lastWord($string);
        if (strcasecmp(static::lastWord($string), 'bucks') === 0 ||
        strcasecmp(static::lastWord($string), 'dollars') === 0) {
            static::testWordFormat($string);
        }

    }

    private function testDollarFormat($string) {
        $matches = array();;
        $r = '/\$?([0-9]+\.)';
    }

    private function testWordFormat($string) {
        $matches = array();;
    }


}
