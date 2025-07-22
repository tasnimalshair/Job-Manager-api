<?php

namespace Tests\Feature\Job;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCreateJobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_admin_can_create_a_job(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);
        $job = Job::factory()->create();
        $category = Category::factory()->create();

        $jobData = [
            'title' => 'Junior Laravel Developer',
            'description' => 'We are looking for a passionate Laravel developer to join our team.',
            'company' => 'TechVision',
            'location' => 'Remote',
            'type' => 'Full-time',
            'deadline' => now()->addDays(10)->toDateString(),
            'salary' => 1200,
            'category_id' => $category->id,
            'created_by' => $admin->id,
            'status' => 'active',
        ];

        $response = $this->actingAs($admin, 'sanctum')
            ->postJson('api/admin/jobs', $jobData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('job-listings', [
            'title' => 'Junior Laravel Developer',
            'description' => 'We are looking for a passionate Laravel developer to join our team.',
            'company' => 'TechVision',
        ]);
    }
}
