<?php

namespace App\Services;

use App\Repositories\OfficeRepository;
use App\Models\Office;

class OfficeService
{
    public function __construct(
        protected OfficeRepository $office_repository,
    ) {}

    /**
     * 根據id取得辦公室
     * 
     * @param int $id
     * @return Office | null
     */
    public function getOfficeById(int $id)
    {
        return $this->office_repository->getOfficeById($id);
    }
}
