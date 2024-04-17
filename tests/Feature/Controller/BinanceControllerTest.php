<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\BinanceService;
use Mockery\MockInterface;

class BinanceControllerTest extends TestCase
{
    public function testGetPriceOfSymbol()
    {
        $expected = [    
            'symbol' => 'BTCUSDT',
            'price' => '70684.47000000'
        ];

        $this->mock(BinanceService::class, function (MockInterface $mock) use ($expected) {
            $mock->shouldReceive('getPriceOfSymbol')
                ->once()
                ->with($expected['symbol'])
                ->andReturn($expected);
        });

        $response = $this->post('/api/binance/price', ['symbol' => 'BTCUSDT']);

        $response->assertStatus(200)
            ->assertJson($expected);
    }
}
