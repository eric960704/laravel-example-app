<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Transformers\CustomerTransformer;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customer_service,
        protected CustomerTransformer $customer_transformer,
    ) {}

    public function getCustomers()
    {
        $customers = $this->customer_service->getCustomers();

        return $this->customer_transformer->transformCustomers($customers);
    }

    public function getCustomersByOfficeId($id)
    {
        $customers = $this->customer_service->getCustomersByOfficeId($id);

        return $this->customer_transformer->transformCustomers($customers);
    }

    public function createCustomer(CustomerRequest $request)
    {
        $customer = $this->customer_service->createCustomer($request->all());

        return $this->customer_transformer->transformCustomer($customer);
    }

    public function updateCustomer(CustomerRequest $request, $id)
    {
        $this->customer_service->updateCustomer($request->all(), $id);

        return response()->json(['success']);
    }

    public function deleteCustomer($id)
    {
        $this->customer_service->deleteCustomer($id);

        return response()->json(['success']);
    }
}
