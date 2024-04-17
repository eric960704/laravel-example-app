<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Transformers\OfficeTransformer;
use App\Services\OfficeService;
use App\Traits\OfficeCache;
use Illuminate\Support\Facades\Cache;

class OfficeController extends Controller
{
    use OfficeCache;
    
    public function __construct(
        protected OfficeService $office_service,
        protected OfficeTransformer $office_transformer,
    ) {}

    public function getOfficeById(int $id)
    {
        $cacheKey = 'office_' . $id;

        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($id) {
            $offices = $this->office_service->getOfficeById($id);
            
            return $this->office_transformer->transformOffice($offices);
        });
    }
}
