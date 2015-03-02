<?php

namespace G4\Commando;

class Value
{

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $optionValues;

    /**
     * @var array
     */
    private $values;

    /**
     * @param array $options
     * @param array $optionValues
     */
    public function __construct($options, $optionValues)
    {
        $this->options      = $options;
        $this->optionValues = $optionValues;
        $this->values       = [];
    }

    public function fill()
    {
        foreach ($this->options as $option) {
            $this->values[$option->getLong()]  = $option->getValue($this->optionValues);
            $this->values[$option->getShort()] = $option->getValue($this->optionValues);
        }
    }

    /**
     * @param string $optionName
     * @return mixed
     */
    public function getValue($optionName)
    {
        return $this->hasValue($optionName)
            ? $this->values[$optionName]
            : null;
    }

    public function hasValue($optionName)
    {
        return isset($this->values[$optionName]);
    }
}