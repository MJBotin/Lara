<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;

class JobFactory extends Factory
{
    protected $model = \App\Models\Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => '$50,000,00', // store as integer, format in views if needed
        ];
    }
}
