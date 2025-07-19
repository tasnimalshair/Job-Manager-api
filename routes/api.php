<?php

use App\Http\Controllers\Application\AdminApplicationController;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

## Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::prefix('jobs')->controller(JobController::class)
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{job}', 'show');
        Route::post('/', 'store');
        Route::put('/{job}', 'update');
        Route::delete('/{job}', 'destroy');
    });

Route::get('admin/applications', [AdminApplicationController::class, 'index']);
Route::get('admin/jobs/{id}/applications', [AdminApplicationController::class, 'filterByJob']);
