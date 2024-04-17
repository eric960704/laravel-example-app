<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customerName' => $this->faker->company(), 
            'contactLastName' => $this->faker->lastName(),
            'contactFirstName' => $this->faker->firstName(), 
            'phone' => $this->faker->phoneNumber(), 
            'addressLine1' => $this->faker->streetAddress(), 
            'addressLine2' => $this->faker->secondaryAddress(), 
            'city' => $this->faker->city(), 
            'state' => $this->faker->stateAbbr(), 
            'postalCode' => $this->faker->postcode(), 
            'country' => $this->faker->country(), 
            'salesrepemployeenumber' => 1, 
            'creditLimit' => $this->faker->numberBetween(0, 1000000)
        ];
    }
}
