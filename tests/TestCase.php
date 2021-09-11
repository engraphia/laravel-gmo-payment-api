<?php

namespace Prum\LaravelGmoPaymentApi\Test;

use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Prum\LaravelGmoPaymentApi\Facades\GmoApi;
use Prum\LaravelGmoPaymentApi\GmoPaymentApi;
use Prum\LaravelGmoPaymentApi\Providers\GmoServiceProvider;

/**
 * Class TestCase
 * @package Prum\LaravelGmoPaymentApi\Test
 */
abstract class TestCase extends OrchestraTestCase
{
    /**
     * @var Http
     */
    protected Http $http;

    /**
     * @var GmoPaymentApi
     */
    protected GmoPaymentApi $object;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('gmo_api', [
            'access_type' => 1,
            'exception_mode' => true,
            'timeout' => 10,
            'base_url' => 'https://pt01.mul-pay.jp/payment',
            'gmo_site_id' => config('gmo_api.gmo_site_id', 'gmo_site_id'),
            'gmo_site_password' => config('gmo_api.gmo_site_password', 'gmo_site_password'),
            'gmo_shop_id' => config('gmo_api.gmo_shop_id', 'gmo_shop_id'),
            'gmo_shop_password' => config('gmo_api.gmo_shop_password', 'gmo_shop_password')
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageProviders($app)
    {
        return [
            GmoServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageAliases($app)
    {
        return [
            'GmoApi' => GmoApi::class,
        ];
    }
}
