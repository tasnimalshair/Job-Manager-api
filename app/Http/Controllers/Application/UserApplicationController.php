<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserApplicationController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $applications = Application::where('user_id', Auth::id())->get();
        return $this->success(ApplicationResource::collection($applications), 'Retrieved Successfully!');
    }

    public function show(Application $application)
    {
        return $this->success(new ApplicationResource($application), 'Retrieved Successfully!');
    }
}
