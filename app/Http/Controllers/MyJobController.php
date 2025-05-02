<?php

namespace App\Http\Controllers;

use App\Models\JobBoard;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_jobs.index', ['jobs' => auth()->user()->employer->jobBoards()
        ->with('employer', 'job_applications', 'job_applications.user')
        ->latest()
        ->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'experience' => 'required|in:' . implode(',', JobBoard::$experience),
            'category' => 'required|in:' . implode(',' , JobBoard::$category)
        ]);

        auth()->user()->employer->jobBoards()->create($validatedData);

        return redirect()->route('my-jobs.index')->with('success', 'Job created successfully');
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
