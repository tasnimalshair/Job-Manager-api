<?php

namespace Tests\Feature\Application;

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAccessAllAppliedApplicationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_can_see_all_applied_applications(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $jobs = Job::factory()->count(2)->create();

        foreach ($jobs as $job) {
            $user->applications()->create([
                'job_id' => $job->id,
                'cv_path' => 'dummy.pdf',
            ]);
        }

        $response = $this->actingAs($user, 'sanctum')
            ->getJson('api/user/applications');

        $response->assertStatus(200);
    }
}
