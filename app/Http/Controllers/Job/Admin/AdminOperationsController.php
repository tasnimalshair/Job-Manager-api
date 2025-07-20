<?php

namespace App\Http\Controllers\Job\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\UpdateStatusRequest;
use App\Models\Job;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class AdminOperationsController extends Controller
{
    use ApiResponse;

    public function toggleStatus(Job $job)
    {
        if ($job->deadline > now()) {
            $job->status = 'closed';
            $job->save();
        }
        return $this->successMessage('Status closed');
    }

    public function toggleStatusByAdmin(UpdateStatusRequest $request, Job $job)
    {
        $job->status = $request->status;
        $job->save();
        return $this->successMessage('Status updated successfully!');
    }
}
