<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 3),
            'job_id' => rand(1, 7),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
            'cv_path' => 'cv_files/sample_cv.pdf',
            'coverletter' => fake()->optional()->sentence(),
        ];
    }
}
