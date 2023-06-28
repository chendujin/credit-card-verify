# Laravel Credit Card Validator

[![Packagist](https://img.shields.io/packagist/v/rap2hpoutre/laravel-credit-card-validator.svg)]()
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/scrutinizer/build/g/rap2hpoutre/laravel-credit-card-validator.svg?style=flat-square)](https://travis-ci.org/rap2hpoutre/laravel-credit-card-validator)
[![Quality Score](https://img.shields.io/scrutinizer/g/rap2hpoutre/laravel-credit-card-validator.svg?style=flat-square)](https://scrutinizer-ci.com/g/rap2hpoutre/laravel-credit-card-validator)

Adds some minimal validation rules for credit card.
## Install
Install via composer
```
composer require chendujin/credit-card-verify
```
Add Service Provider to `config/app.php` in `providers` section
```php
Chendujin\CreditCardVerify\ServiceProvider::class,
```

## Usage

Add this to your validation rules:

```php
// Add this in your controller method
$this->validate($request, [
    'credit-card-number' => 'required|ccn',
    'credit-card-date' => 'required|ccd',
    'credit-validation-code' => 'required|cvc',
]);
```
