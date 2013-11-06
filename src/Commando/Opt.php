<?php

namespace Commando;

use Commando\Option;
use Commando\Value;

class Opt
{

    private $_long = array();

    private $_optValues = null;

    private $_options = array();

    private $_short = array();

    private $_value;


    public function __construct()
    {
        $this->_value = new Value();
    }

    public function addLong($long)
    {
        $this->_long[$long] = $long.':';
    }

    public function addShort($short)
    {
        $this->_short[$short] = $short.':';
    }

    public function addOption(Option $option)
    {
        $this->_options[] = $option;
    }

    public function getOptValues()
    {
        return $this->_optValues;
    }

    public function getValue($optionName)
    {
        $this->_getOpt();

        return $this->_value->getValue($optionName);
    }

    public function hasInOptions($optionName)
    {
        return isset($this->_optValues[$optionName]);
    }

    private function _getLongFormatted()
    {
        return array_values($this->_long);
    }

    private function _getShortFormatted()
    {
        return join('', $this->_short);
    }

    private function _getOpt()
    {
        if ($this->_optValues === null) {
            $this->_optValues = getopt($this->_getShortFormatted(), $this->_getLongFormatted());

            $this->_value->setOptionValues($this->_optValues)
                         ->setOptions($this->_options)
                         ->fillValues();
        }
    }
}