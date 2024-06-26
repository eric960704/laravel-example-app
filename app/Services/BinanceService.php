<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class BinanceService
{
    /**
     * 取得單一幣別的價格
     *
     * @param string $symbol
     * @return array
     */
    public function getPriceOfSymbol(string $symbol)
    {
        $apiEndpoint = Config::get('binance.ticker_price_endpoint');

        $url = $apiEndpoint . '?symbol=' . urlencode($symbol);
    
        $response = Http::get($url);
    
        return $response->json();
    }
}
