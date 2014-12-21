# Wildcards [![Build Status](https://travis-ci.org/ddliu/php-wildcards.svg)](https://travis-ci.org/ddliu/php-wildcards)

Simple wildcards in PHP.

## Installation

```
composer require ddliu/wildcards
```

## Usage

```php
use ddliu\wildcards\Wildcards;

$wildcards = new Wildcards('http://google.com/search/*');
var_dump($wildcards->match('http://google.com/search/php')); // true
```