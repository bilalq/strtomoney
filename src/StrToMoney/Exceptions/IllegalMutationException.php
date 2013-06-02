<?php namespace StrToMoney\Exceptions;

class IllegalMutationException extends \Exception {

    public function __construct($key, $val, $code = 0, \Exception $prev = null) {
        $message = "Cannot set immutable key \"$key\" with value \"$val\"";
        parent::__construct($message, $code, $prev);
    }

}
