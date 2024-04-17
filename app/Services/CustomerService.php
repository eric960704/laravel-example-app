<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService
{
    public function __construct(
        protected CustomerRepository $customer_repository,
    ) {}

    public function getCustomers()
    {
        return $this->customer_repository->getCustomers();
    }

    public function getCustomersByOfficeId($id)
    {
        return $this->customer_repository->getCustomersByOfficeId($id);
    }

    public function createCustomer(array $params)
    {
        return $this->customer_repository->createCustomer($params);
    }

    public function updateCustomer(array $params, int $id)
    {
        return $this->customer_repository->updateCustomer($params, $id);
    }

    public function deleteCustomer(int $id)
    {
        return $this->customer_repository->deleteCustomer($id);
    }
}
