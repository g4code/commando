commando
======

> commando - [php](http://php.net) library

## Install

Add a dependency on `g4code/commando` to your project's `composer.json` file. 

[Composer](http://getcomposer.org/)

[g4code/commando](https://packagist.org/packages/g4code/commando)

## Usage

```php
<?php

use Commando\Cli;

$cli = new Cli();
$cli->version('x.x.x');
$cli->option()->short("p")
              ->long("param")
              ->desc('param name description');
              
echo $cli->getOption('param'); // outputs param option value
```

## Development

### Install dependencies

    $ make install

### Run tests

    $ make test

## License

(The MIT License)
see LICENSE file for details...