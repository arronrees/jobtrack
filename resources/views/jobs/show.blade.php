<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <x-navigation.back-btn href="/jobs" text="Jobs" />
        </div>

        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-2xl font-semibold mb-2">{{ $job->name }}</h1>
                <div class="flex gap-2 text-sm">
                    <x-ui.pill type="job-status" :job_status="$job->status">{{ $job->status }}</x-ui.pill>
                    <x-ui.pill type="job-type" :job_type="$job->type">{{ $job->type }}</x-ui.pill>
                </div>
            </div>
            @can('update', $job)
                <div class="flex gap-2 flex-col ml-auto">
                    <a href="/jobs/{{ $job->id }}/edit" class="btn--edit">Edit</a>
                </div>
            @endcan
        </div>

        <div class="mt-16 text-sm flex flex-col gap-3 font-light">
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Client</div>
                <div class=" flex gap-2 items-center">
                    <img src="/{{ $job->client->logo }}" class="w-6 h-6 rounded">
                    <a href="/clients/{{ $job->client->id }}">{{ $job->client->name }}</a>
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">User</div>
                <div class="flex gap-2 items-center">
                    <img src="/{{ $job->user->avatar_url }}" class="w-6 h-6 rounded">
                    {{ $job->user->name }}
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Type</div>
                <div>{{ $job->type }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Status</div>
                <div>{{ $job->status }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Cost</div>
                <div>£{{ number_format($job->cost) }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Due Date</div>
                <div>{{ date_format(date_create($job->due_date), 'd M Y') }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Notes</div>
                <div>{{ $job->notes }}</div>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="font-semibold text-lg mb-4 pb-1 border-b-2 border-slate-100">Invoices</h2>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Due Date</x-table.th>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Amount</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($job->invoices as $invoice)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                {{ date_format(date_create($invoice->due_date), 'd M Y') }}
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                {{ $invoice->name }}
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                <x-ui.pill type="invoice-status" :invoice_status="$invoice->status">{{ $invoice->status }}</x-ui.pill>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                £{{ number_format($invoice->amount) }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
