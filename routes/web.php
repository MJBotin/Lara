<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();
    return view('home', ['jobs' => $jobs]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(3);
    return view('jobs/index', ['jobs' => $jobs]);

});

Route::get('/jobs/create', function () {
    return view('jobs.create');
 // view file is resources/views/create.blade.php
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    //if ($job) {
       return view('jobs.show', ['job' => $job]);

    //} else {
     //   abort(404, 'Job not found');
    }
//}
);

Route::post('/jobs', function (Request $request) {
    $validated = request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    
    $employerId = 82; // Replace with authenticated employer/user ID
    
    Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => $employerId,
    ]);
    
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
