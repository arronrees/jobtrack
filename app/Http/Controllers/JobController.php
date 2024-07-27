<?php

namespace App\Http\Controllers;

use App\JobStatus;
use App\JobType;
use App\Models\Client;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::query()->with(['client', 'user']);

        $status = $request->query('status');
        $type = $request->query('type');

        if ($status) {
            $jobs->where('status', '=', $status);
        }
        if ($type) {
            $jobs->where('type', '=', $type);
        }

        $jobs = $jobs->where('archived', '!=', true)->paginate(40)->appends($request->all());

        $types = JobType::cases();
        $statuses = JobStatus::cases();

        return view('jobs.index', [
            'jobs' => $jobs,
            'types' => $types,
            'statuses' => $statuses,
            'current_status' => $status,
            'current_type' => $type,
        ]);
    }

    public function archive(Request $request)
    {
        $jobs = Job::query()->with(['client', 'user']);

        $status = $request->query('status');
        $type = $request->query('type');

        if ($status) {
            $jobs->where('status', '=', $status);
        }
        if ($type) {
            $jobs->where('type', '=', $type);
        }

        $jobs = $jobs->where('archived', '=', true)->paginate(40)->appends($request->all());

        $types = JobType::cases();
        $statuses = JobStatus::cases();

        return view('jobs.index', [
            'jobs' => $jobs,
            'types' => $types,
            'statuses' => $statuses,
            'current_status' => $status,
            'current_type' => $type,
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function create()
    {
        $users = User::all(['name', 'id']);

        $clients = Client::all(['name', 'id']);

        $types = JobType::cases();
        $statuses = JobStatus::cases();

        return view('jobs.create', [
            'users' => $users,
            'clients' => $clients,
            'types' => $types,
            'statuses' => $statuses
        ]);
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'type' => ['required', Rule::enum(JobType::class)],
            'status' => ['required', Rule::enum(JobStatus::class)],
            'notes' => ['nullable'],
            'cost' => ['integer'],
            'due_date' => ['date', 'nullable'],
            'user_id' => ['required', 'exists:users,id'],
            'client_id' => ['required', 'exists:clients,id'],
        ]);

        $job = Job::create($validatedAttributes);

        return redirect("/jobs/{$job->id}");
    }

    public function edit(Job $job)
    {
        $users = User::all(['name', 'id']);

        $clients = Client::all(['name', 'id']);

        $types = JobType::cases();
        $statuses = JobStatus::cases();

        return view('jobs.edit', [
            'users' => $users,
            'clients' => $clients,
            'types' => $types,
            'statuses' => $statuses,
            'job' => $job
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'type' => ['required', Rule::enum(JobType::class)],
            'status' => ['required', Rule::enum(JobStatus::class)],
            'notes' => ['nullable'],
            'cost' => ['integer'],
            'due_date' => ['date', 'nullable'],
            'user_id' => ['required', 'exists:users,id'],
            'client_id' => ['required', 'exists:clients,id'],
        ]);

        $job->update($validatedAttributes);

        return redirect("/jobs/{$job->id}");
    }
}
