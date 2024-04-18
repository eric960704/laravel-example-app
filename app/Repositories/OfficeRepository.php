<?php

namespace App\Repositories;

use App\Models\Office;

class OfficeRepository
{
    /**
     * 根據id取得辦公室
     * 
     * @param int $id
     * @return Office | null
     */
    public function getOfficeById(int $id)
    {
        return Office::where("officeCode", $id)->first();
    }
}
