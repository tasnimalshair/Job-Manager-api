<?php

namespace Tests\Feature\Job;

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserIsAppliedToJob extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);
        $job = Job::factory()->create();

        $job->applications()->create([
            'user_id' => $user->id,
            'cv_path' => UploadedFile::fake()->create('file.pdf', 100, 'application/pdf'),
            'coverletter' => 'text',
        ]);

        $this->assertTrue($job->hasApplied($user));
    }
}
