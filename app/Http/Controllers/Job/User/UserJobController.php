<?php

namespace App\Http\Controllers\Job\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Trait\ApiResponse;

class UserJobController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->success(JobResource::collection(Job::with('applications')
            ->where('status', 'active')
            ->latest()->paginate(10)), 'Retrieved Successfully!');
    }

    public function show(Job $job)
    {
        return $this->success(
            new JobResource($job),
            'Retrieved Successfully!'
        );
    }
}
