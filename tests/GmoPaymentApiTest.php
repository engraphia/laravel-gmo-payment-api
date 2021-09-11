<?php

namespace Prum\LaravelGmoPaymentApi\Test;

use Illuminate\Support\Facades\Http;
use Prum\LaravelGmoPaymentApi\GmoPaymentApi;
use Prum\LaravelGmoPaymentApi\Test\Concerns\GmoCvs;

/**
 * Class GmoPaymentApiTest
 * @package Prum\LaravelGmoPaymentApi\Test
 */
class GmoPaymentApiTest extends TestCase
{
    use GmoCvs;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->http = new Http();
        $this->object = new GmoPaymentApi($this->app['config'], $this->http);
    }
}
