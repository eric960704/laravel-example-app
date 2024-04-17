<?php

namespace App\Http\Controllers;

use App\Http\Requests\BinanceRequest;
use App\Services\BinanceService;

class BinanceController extends Controller
{
    public function __construct
    (
        protected BinanceService $binance_service
    ) {}

    public function getPriceOfSymbol(BinanceRequest $request)
    {
        $price = $this->binance_service->getPriceOfSymbol($request->symbol);

        return response()->json($price);
    }
}
