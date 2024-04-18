<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Transformers\CustomerTransformer;
use App\Services\CustomerService;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customer_service,
        protected CustomerTransformer $customer_transformer,
    ) {}

    /**
     * 取得客戶列表
     * 
     * @return Response
     */
    public function getCustomers()
    {
        $customers = $this->customer_service->getCustomers();

        return $this->customer_transformer->transformCustomers($customers);
    }

    /**
     * 根據辦公室編號取得客戶列表
     * 
     * @param  int  $id
     * @return Response
     */
    public function getCustomersByOfficeId(int $id)
    {
        $customers = $this->customer_service->getCustomersByOfficeId($id);

        return $this->customer_transformer->transformCustomers($customers);
    }

    /**
     * 新增客戶
     * 
     * @param  CustomerRequest  $request
     * @return Response
     */
    public function createCustomer(CustomerRequest $request)
    {
        $customer = $this->customer_service->createCustomer($request->all());

        return $this->customer_transformer->transformCustomer($customer);
    }

    /**
     * 更新客戶
     * 
     * @param  CustomerRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function updateCustomer(CustomerRequest $request,int $id)
    {
        $this->customer_service->updateCustomer($request->all(), $id);

        return response()->json(['success']);
    }

    /**
     * 刪除客戶
     * 
     * @param  int  $id
     * @return Response
     */
    public function deleteCustomer(int $id)
    {
        $this->customer_service->deleteCustomer($id);

        return response()->json(['success']);
    }
}
