<?php

namespace G4\Commando;

use G4\Commando\Opt;
use G4\Commando\Option;

class Cli
{

    /**
     * @var \G4\Commando\Opt
     */
    private $_opt;

    private $_version;


    public function __construct()
    {
        $this->_checkIfRunningInCli();

        $this->_opt = new Opt();
    }

    public function getOpt()
    {
        return $this->_opt;
    }

    public function getOption($optionName)
    {
        return $this->_opt->getValue($optionName);
    }

    public function option()
    {
        return new Option($this->_opt);
    }

    public function version($version)
    {
        $this->_version = $version;

        return $this;
    }

    private function _checkIfRunningInCli()
    {
        if (PHP_SAPI !== 'cli') {
            echo 'Warning: Composer should be invoked via the CLI version of PHP, not the '.PHP_SAPI.' SAPI'.PHP_EOL;
        }
    }
}