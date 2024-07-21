<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }
}
