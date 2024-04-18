<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Transformers\OfficeTransformer;
use App\Services\OfficeService;
use App\Traits\OfficeCache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;

class OfficeController extends Controller
{
    use OfficeCache;
    
    public function __construct(
        protected OfficeService $office_service,
        protected OfficeTransformer $office_transformer,
    ) {}

    /**
     * 根據id取得辦公室
     * 
     * @param int $id
     * @return Response
     */
    public function getOfficeById(int $id)
    {
        $cacheKey = 'office_' . $id;

        $response = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($id) {
            $offices = $this->office_service->getOfficeById($id);

            return $this->office_transformer->transformOffice($offices);
        });

        return response()->json($response);
    }
}
