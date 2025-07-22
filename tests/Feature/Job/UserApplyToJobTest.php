<?php

namespace Tests\Feature\Job;

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserApplyToJobTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_user_can_apply_to_a_job(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);
        $job = Job::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->postJson("api/user/jobs/{$job->id}/apply", [
                'cv_path' => UploadedFile::fake()->create('cv.pdf', 100, 'application/pdf'),
                'coverletter' => 'test coverletter',
            ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'applications',
            [
                'user_id' => $user->id,
                'job_id' => $job->id,
            ]
        );
    }
}
