<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['job' => function ($query) {
            $query->with(['client']);
        }])->get();

        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['job' => function ($query) {
            $query->with('client');
        }]);

        return view('invoices.show', ['invoice' => $invoice]);
    }
}
