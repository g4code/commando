<?php

namespace G4\Commando;

use G4\Commando\Cli;

class Option
{

    /**
     * @var \G4\Commando\Cli
     */
    private $cli;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $long;

    /**
     * @var string
     */
    private $short;


    public function __construct(Cli $cli)
    {
        $this->cli = $cli;
    }

    public function desc($desc)
    {
        $this->desc = $desc;
        return $this->cli;
    }

    public function getLong()
    {
        return $this->long;
    }

    public function getShort()
    {
        return $this->short;
    }

    public function getValue($optionValues)
    {
        if (isset($optionValues[$this->short])) {
            return $optionValues[$this->short];
        }
        if (isset($optionValues[$this->long])) {
            return $optionValues[$this->long];
        }
        return null;
    }

    public function long($long)
    {
        $this->long = $long;
        return $this;
    }

    public function short($short)
    {
        $this->short = $short;
        return $this;
    }
}