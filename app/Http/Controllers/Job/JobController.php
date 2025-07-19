<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return $this->success(JobResource::collection(Job::all()), 'Retrieved Successfully!');
    }

    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $job = Job::create($data);
        return $this->success(new JobResource($job), 'Added Successfully!', 200);
    }

    public function update(UpdateJobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        if ($job->created_by !== Auth::id()) {
            return $this->error('Unautherized user', 403);
        }
        $data = $request->validated();
        $job->update($data);
        return $this->success(new JobResource($job), 'Updated Successfully!', 200);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        if ($job->created_by !== Auth::id()) {
            return $this->error('Unautherized user', 403);
        }
        $job->delete();
        return $this->successMessage('Deleted Successfully!', 200);
    }
}
