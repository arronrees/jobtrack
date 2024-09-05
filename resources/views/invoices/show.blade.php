<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/invoices" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Invoices
            </a>
        </div>

        @error('delete')
            <div class="mb-6">
                <x-forms.error>
                    {{ $message }}
                </x-forms.error>
            </div>
        @enderror

        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-2xl font-semibold mb-2">{{ $invoice->name }}</h1>
                <div class="flex gap-2 text-sm">
                    <x-ui.pill type="invoice-status" :invoice_status="$invoice->status">{{ $invoice->status }}</x-ui.pill>
                </div>
            </div>
            <div class="flex gap-2 ml-auto">
                @can('delete', $invoice)
                    @if ($invoice->status === 'Ready To Invoice')
                        <div>
                            <form action="/invoices/{{ $invoice->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn--delete">Delete Invoice</button>
                            </form>
                        </div>
                    @endif
                @endcan
                <a href="/invoices/{{ $invoice->id }}/edit" class="btn--edit">Edit</a>
            </div>
        </div>

        <div class="mt-16 text-sm flex flex-col gap-3 font-light">
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Job</div>
                <div class="flex gap-2 items-center">
                    <a href="/jobs/{{ $invoice->job->id }}" class="flex gap-4 items-center">
                        <span>{{ $invoice->job->name }}</span>
                        <x-ui.pill type="job-status"
                            job_status="{{ $invoice->job->status }}">{{ $invoice->job->status }}</x-ui.pill>
                    </a>
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Client</div>
                <div class="flex gap-2 items-center">
                    <img src="/{{ $invoice->job->client->logo }}" class="w-6 h-6 rounded">
                    <a href="/clients/{{ $invoice->job->client->id }}">{{ $invoice->job->client->name }}</a>
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Amount</div>
                <div>£{{ number_format($invoice->amount) }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Invoice Date</div>
                <div>{{ date_format(date_create($invoice->invoice_date), 'd M Y') }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Due Date</div>
                <div>{{ date_format(date_create($invoice->due_date), 'd M Y') }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Notes</div>
                <div>{{ $invoice->notes }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Private Notes</div>
                <div>{{ $invoice->private_notes }}</div>
            </div>
        </div>

    </div>

</x-layouts.auth>
