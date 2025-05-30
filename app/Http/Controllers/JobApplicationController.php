<?php

namespace App\Http\Controllers;

use App\Models\JobBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(JobBoard $job)
    {
        Gate::authorize('apply', $job);
        return view('job_application.create', ['job'=>$job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobBoard $job, Request $request)
    {
        Gate::authorize('apply', $job);

        $validateData = $request->validate([
            'expected_salary'=>'required|min:1|max:1000000',
            'cv'=>'required|file|mimes:pdf|max:2048'
        ]);

        $file=$request->file('cv');
        $path=$file->store('cvs', 'local');

        $job->job_applications()->create([
            'user_id'=> $request->user()->id,
            'expected_salary'=>$validateData['expected_salary'],
            'cv_path'=>$path
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Application submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
