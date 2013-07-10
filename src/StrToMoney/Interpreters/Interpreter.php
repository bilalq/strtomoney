<?php namespace StrToMoney\Interpreters;

abstract class Interpreter {
    public abstract function interpret($string);

    public function lastWord($string) {
        return array_pop(explode(' ', $string));
    }

    public function firstWord($string) {
        $words = (explode(' ', $string));
        return empty($words) ? '' : $words[0];
    }
}
