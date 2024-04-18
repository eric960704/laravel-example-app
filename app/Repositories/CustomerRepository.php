<?php

namespace App\Repositories;

use App\Enum\CustomerCount;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository
{
    /**
     * 取得所有客戶
     * 
     * @return Collection
     */
    public function getCustomers()
    {
        return Customer::select('*')
                ->limit(CustomerCount::lowCount->value)
                ->get();
    }

    /**
     * 根據id取得客戶
     * 
     * @param int $id
     * @return Collection
     */
    public function getCustomersByOfficeId(int $id)
    {
        return Customer::select('customerNumber', 
                'customerName', 
                'contactLastName', 
                'contactFirstName', 
                'phone', 
                'addressLine1', 
                'addressLine2', 
                'city', 
                'state', 
                'postalCode', 
                'country', 
                'salesrepemployeenumber', 
                'creditLimit'
                )
            ->whereRelation('employee.office', 'officeCode', $id)
            ->get();
    }

    /**
     * 新增客戶
     * 
     * @param array $params
     * @return Customer
     */
    public function createCustomer(array $params)
    {
        return Customer::create($params);
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
        Customer::where('customerNumber', $id)->update($params);
    }

    /**
     * 刪除客戶
     * 
     * @param int $id
     * @return void
     */
    public function deleteCustomer(int $id)
    {
        Customer::where('customerNumber', $id)->delete();
    }
}
