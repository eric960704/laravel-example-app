<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait OfficeCache
{
    public function clearOfficeCache(int $id)
    {
        $cacheKey = 'office_' . $id;

        Cache::forget($cacheKey);
    }
}