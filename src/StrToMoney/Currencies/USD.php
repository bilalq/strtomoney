<?php namespace StrToMoney\Currencies;

class USD extends Currency {

    protected $code = 'USD';
    protected $symbol = '$';
    protected $subUnitSymbol = '¢';
    protected $unitSeperator = '.';
    protected $subUnitLimit = 99;

    public function __construct($dollars = 0, $cents = 0) {
        parent::__construct($dollars, $cents);
    }

    public function subUnitRepresentation() {
        if ($this->subUnits < 10) {
            return '0' . $this->subUnits;
        }
        return "$this->subUnits";
    }

}
