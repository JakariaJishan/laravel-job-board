<?php

namespace App\Http\Controllers;

use App\Models\JobBoard;
use Illuminate\Http\Request;

class JobBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');

        return view('jobs.index', ['jobs' => JobBoard::with('employer')->filter($filters)->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $jobs = JobBoard::find($id)->load('employer.jobBoards');
        return view(
            'jobs.show',
            ['job' => $jobs]
        );
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
