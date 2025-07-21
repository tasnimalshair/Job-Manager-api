<?php

use App\Http\Controllers\Application\AdminApplicationController;
use App\Http\Controllers\Application\UserApplicationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Job\Admin\AdminJobController;
use App\Http\Controllers\Job\Admin\AdminOperationsController;
use App\Http\Controllers\Job\User\UserJobController;
use App\Http\Controllers\Job\User\UserOperationsController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

## Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::prefix('admin/jobs')->controller(AdminJobController::class)
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{job}', 'show');
        Route::post('/', 'store');
        Route::put('/{job}', 'update');
        Route::delete('/{job}', 'destroy');
    });

Route::prefix('admin/jobs')->controller(AdminOperationsController::class)
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(function () {
        Route::get('/toggleStatus/{job}', 'toggleStatus');
        Route::post('/toggleStatus/{job}', 'toggleStatusByAdmin');
    });

Route::prefix('admin')->controller(AdminApplicationController::class)
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(function () {
        Route::get('/applications', 'index');
        Route::get('/jobs/{id}/applications', 'filterByJob');
        Route::get('/applications/{application}/accept', 'acceptApplication');
    });

Route::prefix('user/jobs')->controller(UserOperationsController::class)
    ->middleware(['auth:sanctum', 'role:user'])
    ->group(function () {
        Route::get('filter', 'filter');
        Route::post('{id}/apply', 'apply');
    });

Route::prefix('user/jobs')->controller(UserJobController::class)
    ->middleware(['auth:sanctum', 'role:user'])
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{job}', 'show');
    });



Route::prefix('user/applications')->controller(UserApplicationController::class)
    ->middleware(['auth:sanctum', 'role:user'])
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{application}', 'show');
    });
