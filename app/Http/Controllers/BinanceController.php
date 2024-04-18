<?php

namespace App\Http\Controllers;

use App\Http\Requests\BinanceRequest;
use App\Services\BinanceService;
use Illuminate\Http\JsonResponse;

class BinanceController extends Controller
{
    public function __construct
    (
        protected BinanceService $binance_service
    ) {}

    /**
     * 取得單一幣別的價格
     * 
     * @param BinanceRequest $request
     * @return JsonResponse
     */
    public function getPriceOfSymbol(BinanceRequest $request)
    {
        $price = $this->binance_service->getPriceOfSymbol($request->symbol);

        return response()->json($price);
    }
}
