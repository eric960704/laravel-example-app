<?php

namespace App\Transformers;

use App\Models\Customer;
use Illuminate\Support\Collection;

class CustomerTransformer
{
    public function transformCustomers(Collection $customers)
    {
        return $customers->transform(function (Customer $customer) {
            return $this->transformCustomer($customer);
        });
    }

    public function transformCustomer(Customer $customer)
    {
        return [
            'customerNumber' => $customer->customerNumber,
            'customerName' => $customer->customerName,
            'contactLastName' => $customer->contactLastName,
            'contactFirstName' => $customer->contactFirstName,
            'phone' => $customer->phone,
            'addressLine1' => $customer->addressLine1,
            'addressLine2' => $customer->addressLine2,
            'city' => $customer->city,
            'state' => $customer->state,
            'postalCode' => $customer->postalCode,
            'country' => $customer->country,
            'salesRepEmployeeNumber' => $customer->salesRepEmployeeNumber,
            'creditLimit' => $customer->creditLimit
        ];
    }
}
