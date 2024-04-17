<?php

namespace App\Repositories;

use App\Models\Office;

class OfficeRepository
{
    public function getOfficeById(int $id)
    {
        return Office::where("officeCode", $id)->first();
    }
}
