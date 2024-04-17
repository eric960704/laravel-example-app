<?php

namespace Tests\Feature\Repository;

use App\Enum\CustomerCount;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\Office;
use App\Repositories\CustomerRepository;

class CustomerRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $customer_repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->customer_repository = new CustomerRepository();
    }

    public function testGetCustomers(): void
    {
        $office = Office::factory()
            ->create();

        $employee = Employee::factory()
            ->for($office)
            ->create();

        $customers = Customer::factory()
            ->for($employee)
            ->count(CustomerCount::lowCount->value)
            ->create(['salesrepemployeenumber' => $employee->employeeNumber]);

        $result = $this->customer_repository->getCustomers();

        $this->assertCount(CustomerCount::lowCount->value, $result);
        $this->assertEquals($customers->pluck('id')->toArray(), $result->pluck('id')->toArray());
    }
}
