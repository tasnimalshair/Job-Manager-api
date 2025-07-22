<?php

namespace Tests\Feature\Application;

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ValidationFailsWhenCvIsMissingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_validation_fails_when_cv_is_missing(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);
        $job = Job::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->postJson("api/user/jobs/{$job->id}/apply", [
                'coverletter' => 'test coverletter',
            ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('cv_path');
    }
}
