<?php

namespace App\Http\Controllers\Job\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\FilterByLocationRequest;
use App\Http\Requests\Job\FilterByTypeRequest;
use App\Http\Requests\Job\FilterJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Trait\ApiResponse;

class UserOperationsController extends Controller
{
    use ApiResponse;

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
