<?php

namespace App\Repositories;

use App\Enum\CustomerCount;
use App\Models\Customer;

class CustomerRepository
{
    public function getCustomers()
    {
        return Customer::select('*')
                ->limit(CustomerCount::lowCount->value)
                ->get();
    }

    public function getCustomersByOfficeId($id)
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

    public function createCustomer(array $params)
    {
        return Customer::create($params);
    }

    public function updateCustomer(array $params, int $id)
    {
        return Customer::where('customerNumber', $id)->update($params);
    }

    public function deleteCustomer(int $id)
    {
        return Customer::where('customerNumber', $id)->delete();
    }
}
