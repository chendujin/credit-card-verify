<?php
namespace Chendujin\CreditCardVerify;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Inacho\CreditCard;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $validator = $this->app['validator'];

        // verify ccn
        $validator->extend('ccn', function ($attribute, $value, $paramters, $validator) {
            return CreditCard::validCreditCard($value)['valid'];
        });

        // verify ccd
        $validator->extend('ccd', function ($attribute, $value, $paramters, $validator) {
            try {
                $value = explode('/', $value);
                return CreditCard::validDate(strlen($value[1]) == 2 ? (2000+$value[1]) : $value[1], $value[0]);
            } catch(\Exception $e) {
                return false;
            }
        });

        // verify cvc
        $validator->extend('cvc', function ($attribute, $value, $paramters, $validator) {
            return ctype_digit($value) && (strlen($value) == 3 || strlen($value) == 4);
        });
    }
}
