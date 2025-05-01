<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobBoardController;
use App\Http\Controllers\AuthController;

Route::get('', fn() => to_route('jobs.index'));
Route::get('/login', fn() => to_route('auth.create'))->name('login');
Route::resource('jobs', JobBoardController::class);
Route::resource('auth', AuthController::class);

Route::middleware('auth')->group(function () {
    Route::resource('jobs.application', \App\Http\Controllers\JobApplicationController::class);
    Route::resource('my-job-applications', \App\Http\Controllers\MyJobApplicationController::class)
        ->only(['index', 'destroy']);
    Route::resource('employer', \App\Http\Controllers\EmployerController::class)
        ->only(['create', 'store']);
});
