<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Job;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserApplicationController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $applications = Application::with(['job', 'user'])->where('user_id', Auth::id())->latest()->paginate(10);
        return $this->success(ApplicationResource::collection($applications), 'Retrieved Successfully!');
    }

    public function show(Application $application)
    {
        return $this->success(new ApplicationResource($application), 'Retrieved Successfully!');
    }
}
