<?php

namespace G4\Commando;

use G4\Commando\Opt;

class Option
{

    /**
     * @var \Commando\Opt
     */
    private $_opt;

    private $_desc;

    private $_long;

    private $_short;


    public function __construct(Opt $opt)
    {
        $this->_opt = $opt;

        $this->_opt->addOption($this);
    }

    public function desc($desc)
    {
        $this->_desc = $desc;

        return $this;
    }

    public function getLong()
    {
        return $this->_long;
    }

    public function getShort()
    {
        return $this->_short;
    }

    public function getValue()
    {
        $optionValues = $this->_opt->getOptValues();

        if (isset($optionValues[$this->_short])) {
            return $optionValues[$this->_short];
        }

        if (isset($optionValues[$this->_long])) {
            return $optionValues[$this->_long];
        }

        return null;
    }

    public function long($long)
    {
        $this->_long = $long;

        $this->_opt->addLong($this->_long);

        return $this;
    }

    public function short($short)
    {
        $this->_short = $short;

        $this->_opt->addShort($this->_short);

        return $this;
    }
}