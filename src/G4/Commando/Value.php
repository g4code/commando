<?php

namespace G4\Commando;

class Value
{

    private $_options;

    private $_optionValues;

    private $_values = array();


    public function fillValues()
    {
        foreach ($this->_options as $option) {

            $this->_values[$option->getLong()]  = $option->getValue();
            $this->_values[$option->getShort()] = $option->getValue();
        }
    }

    public function getValue($optionName)
    {
        return isset($this->_values[$optionName])
            ? $this->_values[$optionName]
            : null;
    }

    public function setOptions($options)
    {
        $this->_options = $options;

        return $this;
    }

    public function setOptionValues($optionValues)
    {
        $this->_optionValues = $optionValues;

        return $this;
    }
}