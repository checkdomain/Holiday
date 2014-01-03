README [![Build Status](https://travis-ci.org/checkdomain/Holiday.png?branch=master)](https://travis-ci.org/checkdomain/Holiday)
======

What is Checkdomain/Holiday
---------------------------
Checkdomain/Holiday is a small library to check if a specified date is a holiday in a specific country. It also tells you if the given date is a nation wide holiday or just a holiday in some states.

Requirements
------------
Checkdomain/Holiday requires php >= 5.3.

Installation
------------
The easiest way to install this library is through [composer](http://getcomposer.org/). Just add the following lines to your **composer.json** file:

```json
{
   "require": {
        "checkdomain/holiday": "dev-master"
    }
}
```

Another way would be to download this library and configure the autoloading yourself. This library relies on a [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) compatible autoloader for automatic class loading.

Usage
-----
To check for holidays just instantiate the Util class and call the `getHoliday` method.

```php
$util    = new \Checkdomain\Holiday\Util();
$holiday = $util->getHoliday('01.01.2014', 'DE');
```

If you just need to know if there is a holiday on your date there is a `isHoliday` method, too.

Contributing
------------
Checkdomain/Holiday is open source. If you use this library it would be great to get some support for currently not implemented countries which you are familiar with. Pull requests will be reviewed and merged fast.

Running Tests
-------------
Run a `php composer.phar install` command in the base directory to install the `phpunit` dependency. After that you can simply call `vendor/bin/phpunit tests/` to run the test suite.
