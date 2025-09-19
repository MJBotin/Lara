<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();
    return view('home', ['jobs' => $jobs]);
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => Job::all()]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    if ($job) {
        return view('job', ['job' => $job]);
    } else {
        abort(404, 'Job not found');
    }
});

Route::get('/contact', function () {
    return view('contact');
});
