<?php

namespace App\Http\Controllers;

use App\InvoiceStatus;
use App\Models\Invoice;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['job' => function ($query) {
            $query->with(['client']);
        }])->paginate(40);

        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['job' => function ($query) {
            $query->with('client');
        }]);

        return view('invoices.show', ['invoice' => $invoice]);
    }

    public function create()
    {
        $jobs = Job::all(['name', 'id']);

        $statuses = InvoiceStatus::cases();

        return view('invoices.create', [
            'jobs' => $jobs,
            'statuses' => $statuses
        ]);
    }


    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'status' => ['required', Rule::enum(InvoiceStatus::class)],
            'notes' => ['nullable'],
            'private_notes' => ['nullable'],
            'amount' => ['integer'],
            'invoice_date' => ['date', 'nullable'],
            'due_date' => ['date', 'nullable'],
            'job_id' => ['required', 'exists:jobs,id'],
        ]);

        $invoice = Invoice::create($validatedAttributes);

        return redirect("/invoices/{$invoice->id}");
    }
}
