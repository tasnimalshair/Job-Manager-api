<?php

namespace App\Trait;

trait ApiResponse
{

    protected function successMessage($message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], $status);
    }

    protected function success($data = null, $message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function error($message = 'Something went wrong', $status = 400, $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
