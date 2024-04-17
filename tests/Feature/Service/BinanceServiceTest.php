<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Client\Response;
use App\Services\BinanceService;

class BinanceServiceTest extends TestCase
{
    protected $binance_service;

    public function setUp(): void
    {
        parent::setUp();

        $this->binance_service = new BinanceService();
    }

    /**
     * 測試取得單一幣別的價格
     */
    public function testGetPriceOfSymbol()
    {
        $symbol = 'BTCUSDT';

        Config::shouldReceive('get')
            ->with('binance.ticker_price_endpoint')
            ->andReturn('https://www.example.com/api');

        $response = \Mockery::mock(Response::class);
        $response->shouldReceive('json')->andReturn(['price' => 10000]);

        Http::shouldReceive('get')
            ->with('https://www.example.com/api?symbol='.urlencode($symbol))
            ->andReturn($response);

        $result = $this->binance_service->getPriceOfSymbol($symbol);

        $this->assertEquals(['price' => 10000], $result);
    }
}
