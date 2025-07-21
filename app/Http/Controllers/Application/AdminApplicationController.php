<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminApplicationController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $applications = Application::with('user')->latest()->paginate(10);
        return $this->success(ApplicationResource::collection($applications), 'Retrieved Successfully!');
    }

    public function filterByJob($id)
    {
        $applications = Application::where('job_id', $id)->get();
        return $this->success(ApplicationResource::collection($applications), 'Retrieved Successfully1');
    }
}
