<?php namespace StrToMoney\Currencies;

use StrToMoney\Exceptions\IllegalMutationException;

abstract class Currency {

    protected $code;
    protected $symbol;
    protected $subUnitSymbol;
    protected $mainUnits;
    protected $subUnits;
    protected $unitSeperator;
    protected $subUnitLimit;

    public function __construct($mainUnits = 0, $subUnits = 0) {
        $mainUnits = intval($mainUnits);
        $subUnits = intval($subUnits);
        if ($mainUnits < 0 || $subUnits < 0) {
            throw new \InvalidArgumentException;
        }
        $this->mainUnits = $mainUnits;
        $this->subUnits = $subUnits;
    }

    public function __toString() {
        return $this->symbol
            . $this->mainUnits
            . $this->unitSeperator
            . $this->subUnitRepresentation();
    }

    public function getCode() {
        return $this->code;
    }

    public function getSymbol() {
        return $this->symbol;
    }

    public function getSubUnitSymbol() {
        return $this->subUnitSymbol;
    }

    public function getMainUnits() {
        return $this->mainUnits;
    }

    public function getSubUnits() {
        return $this->subUnits;
    }

    public function getUnitSeperator() {
        return $this->unitSeperator;
    }

    public function getSubUnitLimit() {
        return $this->subUnitLimit;
    }

    public function __get($key) {
        return (property_exists($this, $key)) ? $this->{$key} : null;
    }

    public final function __set($key, $value) {
        throw new \StrToMoney\Exceptions\IllegalMutationException($key, $value);
    }

    public abstract function subUnitRepresentation();

}
