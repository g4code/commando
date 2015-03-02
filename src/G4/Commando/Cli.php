<?php

namespace G4\Commando;

use G4\Commando\Opt;
use G4\Commando\Option;

class Cli
{

    /**
     * @var \G4\Commando\Opt
     */
    private $opt;

    /**
     * @var string
     */
    private $version;


    public function __construct()
    {
        $this->checkIfRunningInCli();
        $this->opt = new Opt();
    }

    /**
     * @param string $optionName
     * @return bool
     */
    public function has($optionName)
    {
        return $this->opt->hasValue($optionName);
    }

    /**
     * @return \G4\Commando\Option
     */
    public function option()
    {
        $option = new Option($this);
        $this->opt->addOption($option);
        return $option;
    }

    /**
     * @param string $optionName
     * @return string
     */
    public function value($optionName)
    {
        return $this->opt->getValue($optionName);
    }

    /**
     * @param string $version
     * @return \G4\Commando\Cli
     */
    public function version($version)
    {
        $this->version = $version;
        return $this;
    }

    private function checkIfRunningInCli()
    {
        if (PHP_SAPI !== 'cli') {
            echo 'Warning: Composer should be invoked via the CLI version of PHP, not the '.PHP_SAPI.' SAPI'.PHP_EOL;
        }
    }
}