<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,  // Using Faker for job title
            'description' => $this->faker->paragraph,  // Using Faker for job description
            'location' => $this->faker->city,  // Using Faker for location
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'remote']),  // Random job type
            'salary' => $this->faker->randomElement(['₹50,000/month', '₹80,000/month', '₹1,20,000/month']),  // Random salary
            'company_name' => $this->faker->company,  // Using Faker for company name
        ];
    }
}
