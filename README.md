# PhpSettingsModule

A Zend Framework 2 module that sets up an event listener in order to set PHP settings in an application.

## Installation

Install the module via composer.

```json
"require": {
    "polderknowledge/phpsettings-module": "dev-master"
},
"repositories": [
    {
        "type": "composer",
        "url": "http://developers.polderknowledge.nl/packages"
    }
]
```

Next add the module to your `application.config.php`:

```php
<?php
return array(
    'modules' => array(
        'Application',
        'PolderKnowledge\\PhpSettingsModule',
	),
);
```

## Configuration

Simply add a file called `phpsettings.config.global.php` to your `config/autoload` directory with the following content:

```php
<?php
return array(
    'phpSettings' => array(
        'error_reporting' => 0,
        'display_errors' => 0,
        'display_startup_errors' => 0,
    ),
);
```

The `phpSettings` array is a key/value array where each key corresponds to a PHP INI setting. For a complete list of
all available settings, take a look at the [website of PHP](http://php.net/manual/en/ini.list.php) itself.
