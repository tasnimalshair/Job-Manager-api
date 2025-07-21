<?php

namespace App\Http\Controllers\Job\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Http\Requests\Job\FilterByLocationRequest;
use App\Http\Requests\Job\FilterByTypeRequest;
use App\Http\Requests\Job\FilterJobRequest;
use App\Http\Resources\ApplicationResource;
use App\Http\Resources\JobResource;
use App\Models\Application;
use App\Models\Job;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserOperationsController extends Controller
{
    use ApiResponse;

    public function apply(StoreApplicationRequest $request, Job $job)
    {
        $user_id = Auth::id();

        if ($job->deadline < now()) {
            return $this->error('The application deadline for this job has passed.', 403);
        }

        $isapplied = Application::where('user_id', $user_id)
            ->where('job_id', $job->id)
            ->exists();
        if ($isapplied) {
            return $this->error('Already applied');
        }

        $cvPath = $request->file('cv_path')->storeAs('cvs', "User_{$user_id}_cv", 'uploads');
        $cv_url = Storage::disk('uploads')->url($cvPath);

        $application = Application::create([
            'user_id' => $user_id,
            'job_id' => $job->id,
            'cv_path' => $cv_url,
            'coverletter' => $request->coverletter
        ]);
        return $this->success(new ApplicationResource($application), 'Added Successfully!');
    }

    public function filter(FilterJobRequest $request)
    {
        $query = Job::query();
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('description', 'LIKE', '%' . $keyword . '%');
            });
        }

        $jobs = $query->get();
        return $this->success(JobResource::collection($jobs), 'Filtered Successfully!');
    }
}
