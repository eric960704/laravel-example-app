<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => $this->faker->city, 
            'phone' => $this->faker->phoneNumber, 
            'addressLine1' => $this->faker->streetAddress, 
            'addressLine2' => $this->faker->secondaryAddress, 
            'state' => $this->faker->stateAbbr, 
            'country' => $this->faker->country, 
            'postalCode' => $this->faker->postcode, 
            'territory' => $this->faker->text(8)
        ];
    }
}
