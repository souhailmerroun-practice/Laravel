<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Exchange\Exchange;
use App\Models\Exchange\Binance;
use App\Models\Exchange\CryptoCom;
use App\Models\Bridge\HelloWorldService;
use App\Models\Bridge\PlainTextFormatter;
use App\Models\Bridge\HtmlFormatter;

class ExchangeTest extends TestCase
{
    /**
     * ./vendor/bin/sail test --filter=test_bridge
     */
    public function test_bridge()
    {
        $service = new HelloWorldService(new PlainTextFormatter());

        $this->assertSame('Hello World', $service->get());

        $service = new HelloWorldService(new HtmlFormatter());

        $this->assertSame('<p>Hello World</p>', $service->get());
    }

    /**
     * ./vendor/bin/sail test --filter=test_returns_name
     */
    public function test_returns_name()
    {
        $exchange = new Exchange(new Binance());
        $this->assertSame('binance', $exchange->name());

        $exchange = new Exchange(new CryptoCom());
        $this->assertSame('crypto.com', $exchange->name());
    }
}
