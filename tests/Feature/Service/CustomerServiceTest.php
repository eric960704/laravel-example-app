<?php

namespace Tests\Feature\Service;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\Office;
use App\Repositories\CustomerRepository;
use App\Services\CustomerService;

class CustomerServiceTest extends TestCase
{
    use RefreshDatabase;

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

        $customerRepositoryMock = $this->createMock(CustomerRepository::class);

        $customerRepositoryMock->expects($this->once())
                               ->method('getCustomers')
                               ->willReturn($customers);

        $customerService = new CustomerService($customerRepositoryMock);

        $result = $customerService->getCustomers();

        $this->assertEquals($customers, $result);
    }
}
