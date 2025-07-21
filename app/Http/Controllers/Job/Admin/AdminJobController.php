<?php

namespace App\Http\Controllers\Job\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminJobController extends Controller
{
    use ApiResponse;
    public function index()
    {

        return $this->success(JobResource::collection(Job::with('applications')->latest()->paginate(10)), 'Retrieved Successfully!');
    }

    public function show(Job $job)
    {
        if ($job->created_by !== Auth::id()) {
            return $this->error('Unauthorized user', 403);
        }
        return $this->success(new JobResource($job), 'Retrieved Successfully!');
    }

    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $job = Job::create($data);
        return $this->success(new JobResource($job), 'Added Successfully!', 200);
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        if ($job->created_by !== Auth::id()) {
            return $this->error('Unautherized user', 403);
        }
        $data = $request->validated();
        $job->update($data);
        return $this->success(new JobResource($job), 'Updated Successfully!', 200);
    }

    public function destroy(Job $job)
    {
        if ($job->created_by !== Auth::id()) {
            return $this->error('Unautherized user', 403);
        }
        $job->delete();
        return $this->successMessage('Deleted Successfully!', 200);
    }
}
