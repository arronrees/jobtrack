<?php

namespace App\Http\Controllers;

use App\InvoiceStatus;
use App\Models\Invoice;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::query()->with(['job' => function ($query) {
            $query->with(['client']);
        }]);

        $validStatuses = ['Ready To Invoice', 'Invoiced', 'Paid'];
        $validSortBys = ['name', 'status', 'amount', 'invoice_date', 'due_date'];
        $validSorts = ['asc', 'desc'];

        $status = $request->query('status');
        $sort = $request->query('sort');
        $sortBy = $request->query('sort_by');

        if ($status && in_array($status, $validStatuses)) {
            $invoices->where('status', '=', $status);
        }
        if ($sort && in_array($sort, $validSorts) && $sortBy && in_array($sortBy, $validSortBys)) {
            $invoices->orderBy($sortBy, $sort);
        }

        $invoices = $invoices->where('archived', '!=', true)->paginate(40)->appends($request->all());

        $statuses = InvoiceStatus::cases();

        return view('invoices.index', [
            'invoices' => $invoices,
            'statuses' => $statuses,
            'current_status' => $status,
            'current_sort' => $sort,
            'current_sort_by' => $sortBy,
        ]);
    }

    public function archive(Request $request)
    {
        $invoices = Invoice::query()->with(['job' => function ($query) {
            $query->with(['client']);
        }]);

        $validStatuses = ['Ready To Invoice', 'Invoiced', 'Paid'];
        $validSortBys = ['name', 'status', 'amount', 'invoice_date', 'due_date'];
        $validSorts = ['asc', 'desc'];

        $status = $request->query('status');
        $sort = $request->query('sort');
        $sortBy = $request->query('sort_by');

        if ($status && in_array($status, $validStatuses)) {
            $invoices->where('status', '=', $status);
        }
        if ($sort && in_array($sort, $validSorts) && $sortBy && in_array($sortBy, $validSortBys)) {
            $invoices->orderBy($sortBy, $sort);
        }

        $invoices = $invoices->where('archived', '=', true)->paginate(40)->appends($request->all());

        $statuses = InvoiceStatus::cases();

        return view('invoices.index', [
            'invoices' => $invoices,
            'statuses' => $statuses,
            'current_status' => $status,
            'current_sort' => $sort,
            'current_sort_by' => $sortBy,
        ]);
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

    public function edit(Invoice $invoice)
    {
        $jobs = Job::all(['name', 'id']);

        $statuses = InvoiceStatus::cases();

        return view('invoices.edit', [
            'jobs' => $jobs,
            'statuses' => $statuses,
            'invoice' => $invoice
        ]);
    }

    public function update(Request $request, Invoice $invoice)
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

        $invoice->update($validatedAttributes);

        return redirect("/invoices/{$invoice->id}");
    }
}
