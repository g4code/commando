<?php

namespace G4\Commando;

use G4\Commando\Option;
use G4\Commando\Value;

class Opt
{
    /**
     * @var array
     */
    private $long;

    /**
     * @var array
     */
    private $optValues;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $short;

    /**
     * @var \G4\Commando\Value
     */
    private $value;


    public function __construct()
    {
        $this->options   = [];
        $this->long      = [];
        $this->short     = [];
        $this->optValues = null;
    }

    /**
     * @param \G4\Commando\Option $option
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;
    }

    public function getValue($optionName)
    {
        $this->executeGetOpt();
        return $this->value->getValue($optionName);
    }

    public function hasValue($optionName)
    {
        $this->executeGetOpt();
        return $this->value->hasValue($optionName);
    }

    private function addLong($long)
    {
        if (!empty($long)) {
            $this->long[$long] = $long.':';
        }
        return $this;
    }

    private function addShort($short)
    {
        if (!empty($short)) {
            $this->short[$short] = $short.':';
        }
        return $this;
    }

    private function analizeOptions()
    {
        foreach($this->options as $option) {
            $this
                ->addLong($option->getLong())
                ->addShort($option->getShort());
        }
        return $this;
    }

    private function getLongFormatted()
    {
        return array_values($this->long);
    }

    private function getShortFormatted()
    {
        return join('', $this->short);
    }

    /**
     * @return boolean
     */
    private function hasOptionsAndValues()
    {
        return count($this->options) > 0
        && $this->optValues !== null;
    }

    private function executeGetOpt()
    {
        if (!$this->hasOptionsAndValues()) {

            $this->analizeOptions();

            $this->optValues = getopt($this->getShortFormatted(), $this->getLongFormatted());

            $this->value     = new Value($this->options, $this->optValues);
            $this->value->fill();
        }
    }
}