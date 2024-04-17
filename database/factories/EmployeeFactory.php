<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastName' => fake()->lastName(), 
            'firstName' => fake()->firstName(), 
            'extension' => fake()->suffix(), 
            'email' => fake()->safeEmail(), 
            'officeCode' => fake()->randomElement(['1', '2', '3']),
            'reportsTo' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'jobTitle' => fake()->jobTitle(50),
        ];
    }
}
