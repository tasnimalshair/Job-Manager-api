<?php

namespace App\Http\Controllers\Job\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\UpdateStatusRequest;
use App\Models\Job;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Log;

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
        $old_status = $job->status;
        $job->status = $request->status;
        $job->save();
        Log::channel('application_logs')->info(
            'Status updated successfully!',
            [
                'old_status' => $old_status,
                'updated_status' => $request->status,
            ]
        );

        return $this->successMessage('Status updated successfully!');
    }
}
