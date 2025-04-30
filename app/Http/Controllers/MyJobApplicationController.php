<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_applications.index', [
            'applications'=>auth()->user()
                ->job_applications()
                ->with(['job_board' => fn($query)=>$query->withCount('job_applications')
                    ->withAvg('job_applications', 'expected_salary'), 'job_board.employer'])
                ->latest()->get()
        ]);
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return redirect()->back()->with('success', 'Job application removed.');
    }
}
