<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Job\JobController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

## Auth
Route::post('register', [AuthController::class, 'register']);

Route::apiResource('jobs', JobController::class)
    ->middleware(['auth-sanctum', 'role:admin']);
