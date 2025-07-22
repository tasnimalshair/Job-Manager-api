<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(3, true), // أكثر من 15 حرف
            'company' => $this->faker->company(),
            'location' => $this->faker->randomElement(['On-site', 'Remote']),
            'type' => $this->faker->randomElement(['Full-time', 'Part-time']),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month'),
            'salary' => $this->faker->numberBetween(300, 10000),
            'category_id' => Category::factory(),
            'created_by' => User::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'closed']),
        ];
    }
}
