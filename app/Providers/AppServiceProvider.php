<?php

namespace App\Providers;

use Braintree\Gateway;
use Braintree\AddOnGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Singleton per creare una sola istanza
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '64gmqdyhhff68n2m',
                    'publicKey' => 'k8p6mrrzcrh33w8q',
                    'privateKey' => '12c6e1a1556effe3b2f3cf3136af5876'
                ]
            );
        });
    }
}
