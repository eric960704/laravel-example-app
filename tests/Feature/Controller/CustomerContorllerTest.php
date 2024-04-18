<?php

namespace Tests\Feature\Controller;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\Office;
use Mockery\MockInterface;
use App\Services\CustomerService;
use App\Transformers\CustomerTransformer;

class CustomerContorllerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * 測試取得客戶
     */
    public function testGetCustomers(): void
    {
        $office = Office::factory()
            ->create();

        $employee = Employee::factory()
            ->for($office)
            ->create();

        $customers = Customer::factory()
            ->for($employee)
            ->count(3)
            ->create();

        $expect = $customers->transform(function (Customer $customer) {
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
        });

        $this->mock(CustomerService::class, function (MockInterface $mock) use ($customers) {
            $mock->shouldReceive('getCustomers')
                ->once()
                ->andReturn($customers);
        });
            
        $this->mock(CustomerTransformer::class, function (MockInterface $mock) use ($customers, $expect) {
            $mock->shouldReceive('transformCustomers')
                ->once()
                ->with($customers)
                ->andReturn($expect);
        });

        $response = $this->get('/api/car_dealer/customers');

        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'customerNumber',
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
                'salesRepEmployeeNumber',
                'creditLimit'
            ]
        ]);
    }
}
