<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);


Route::get('/register', [RegisteredUserController::class, 'create']);

// Route::controller(JobController::class)->group(function () {
// // Route::get('/jobs', 'index');
// //     Route::get('/jobs/create', 'create');
// //     Route::post('/jobs', 'store');
// //     Route::get('/jobs/{job}', 'show');
// //     Route::get('/jobs/{job}/edit', 'edit');
// //     Route::patch('/jobs/{job}', 'update');
// //     Route::delete('/jobs/{job}', 'destroy');
// // });


