<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;

class UserApplicationController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $applications = Application::with(['job', 'user'])
            ->where('user_id', Auth::id())->latest()->paginate(10);

        return $this->success(
            ApplicationResource::collection($applications),
            'Retrieved Successfully!'
        );
    }

    public function show(Application $application)
    {
        return $this->success(
            new ApplicationResource($application),
            'Retrieved Successfully!'
        );
    }

    public function destroy(Application $application)
    {
        $user = Auth::user();
        if ($application->user_id !== $user->id) {
            return $this->error('Unauthorized', 403);
        }
        $application->delete();

        return $this->success('Deleted Successfully!');
    }
}
