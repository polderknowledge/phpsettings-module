# Installation

Install the module via composer.

`composer require polderknowledge/phpsettings-module`

Next add the module to your `application.config.php`:

```php
<?php
return [
    'modules' => [
        'Application',
        'PolderKnowledge\\PhpSettingsModule',
	],
];
```

## Configuration

Simply add a file called `phpsettings.global.php` to your `config/autoload` directory with the following content:

```php
<?php
return [
    'phpSettings' => [
        'error_reporting' => 0,
        'display_errors' => 0,
        'display_startup_errors' => 0,
    ],
];
```

The `phpSettings` array is a key/value array where each key corresponds to a PHP INI setting. For a complete list of
all available settings, take a look at the [website of PHP](http://php.net/manual/en/ini.list.php) itself.
