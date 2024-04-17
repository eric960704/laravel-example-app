<?php

namespace App\Transformers;

use App\Models\Office;
use Illuminate\Support\Collection;

class OfficeTransformer
{
    public function transformOffices(Collection $offices)
    {
        return $offices->transform(function (Office $office) {
            return $this->transformOffice($office);
        });
    }

    public function transformOffice(Office $office)
    {
        return [
            'officeCode' => $office->officeCode,
            'city' => $office->city,
            'phone' => $office->phone,
            'addressLine1' => $office->addressLine1,
            'addressLine2' => $office->addressLine2,
            'state' => $office->state,
            'country' => $office->country,
            'postalCode' => $office->postalCode,
            'territory' => $office->territory,
            'created_at' => $office->created_at,
            'updated_at' => $office->updated_at
        ];
    }
}
