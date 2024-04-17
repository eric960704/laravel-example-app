<?php

namespace App\Services;

use App\Repositories\OfficeRepository;

class OfficeService
{
    public function __construct(
        protected OfficeRepository $office_repository,
    ) {}

    public function getOfficeById(int $id)
    {
        return $this->office_repository->getOfficeById($id);
    }
}
