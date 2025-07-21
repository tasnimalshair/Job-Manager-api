<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CheckStatusRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Notifications\ApplicationAcceptedMail;
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

    public function acceptApplication(CheckStatusRequest $request, Application $application)
    {
        $application->status = $request->status;
        $application->save();

        // Sending acception email for user
        if ($request->status === 'accepted') {
            $application->user->notify(new ApplicationAcceptedMail($application));
        }
        return $this->successMessage('Status updated successfully!');
    }

    public function filterByJob($id)
    {
        $applications = Application::where('job_id', $id)->get();
        return $this->success(ApplicationResource::collection($applications), 'Retrieved Successfully1');
    }
}
