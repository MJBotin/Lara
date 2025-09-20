<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index() 
    {
        $jobs = Job::with('employer')->simplePaginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create() 
    {
        return view('jobs.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'salary' => 'required|string|max:255',
    ]);

    Job::create([
        'title' => $request->title,
        'salary' => $request->salary,
        'employer_id' => auth()->user()->employer->id ?? 1, // example: current user's employer id or fallback to 1
    ]);

    return redirect()->back()->with('success', 'Job created successfully!');
}
    public function show(Job $job) 
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job) 
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required',
        ]);

        $job->update($validated);

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job) 
    {
        $job->delete();
        return redirect('/jobs')->with('success', 'Job deleted successfully.');
    }
}
