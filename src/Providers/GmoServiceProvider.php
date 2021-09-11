<?php

namespace Prum\LaravelGmoPaymentApi\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Prum\LaravelGmoPaymentApi\GmoPaymentApi;

/**
 * Class GmoServiceProvider
 * @package Prum\LaravelGmoPaymentApi\Providers
 */
class GmoServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind('Prum.gmo_payment_api', function ($app) {
            $http = new Http();
            return new GmoPaymentApi($app['config'], $http);
        });

        $this->publishes([
            __DIR__ . '/../../configs/gmo_api.php' => config_path('gmo_api.php'),
        ]);
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../configs/gmo_api.php',
            'gmo_api'
        );
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            'Prum.gmo_payment_api'
        ];
    }
}
