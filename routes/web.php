<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobBoardController;

Route::get('', fn()=>to_route('jobs.index'));
Route::resource('jobs', JobBoardController::class);
