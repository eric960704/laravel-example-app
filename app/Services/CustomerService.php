<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Customer;

class CustomerService
{
    public function __construct(
        protected CustomerRepository $customer_repository,
    ) {}

    /**
     * 取得客戶列表
     * 
     * @return Collection
     */
    public function getCustomers()
    {
        return $this->customer_repository->getCustomers();
    }

    /**
     * 根據ID取得客戶列表
     * 
     * @param int $id
     * @return Collection
     */
    public function getCustomersByOfficeId(int $id)
    {
        return $this->customer_repository->getCustomersByOfficeId($id);
    }

    /**
     * 新增客戶
     * 
     * @param array $params
     * @return Customer
     */
    public function createCustomer(array $params)
    {
        return $this->customer_repository->createCustomer($params);
    }

    /**
     * 更新客戶
     * 
     * @param array $params
     * @param int $id
     * @return void
     */
    public function updateCustomer(array $params, int $id)
    {
        $this->customer_repository->updateCustomer($params, $id);
    }

    /**
     * 刪除客戶
     * 
     * @param int $id
     * @return void
     */
    public function deleteCustomer(int $id)
    {
        $this->customer_repository->deleteCustomer($id);
    }
}
