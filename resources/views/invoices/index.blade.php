<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Invoices</h1>
            @if (request()->is('invoices/archive'))
                <a href="/invoices" class="btn--outline ml-auto">Current Invoices</a>
            @else
                <a href="/invoices/archive" class="btn--outline ml-auto">Archived Invoices</a>
            @endif
            <a href="/invoices/create" class="btn--add">Add
                Invoice</a>
        </div>

        <div class="flex gap-4 mb-6">
            <div class="flex flex-col gap-2">
                <p class="text-xs font-medium opacity-60">Filter By Status</p>
                <div class="flex gap-2 flex-wrap">
                    @foreach ($statuses as $status)
                        <a href="{{ url()->current() }}?status={{ $status->value }}"
                            class="text-xs rounded-full px-2 py-1 border border-slate-200 transition hover:bg-slate-200 {{ $current_status === $status->value ? 'bg-slate-200' : '' }}">{{ $status->value }}</a>
                    @endforeach
                </div>
                <div>
                    <a href="{{ url()->current() }}?status="
                        class="text-xs opacity-50 transition hover:opacity-70 border-b border-transparent hover:border-slate-500">Clear</a>
                </div>
            </div>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Client</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Amount</x-table.th>
                        <x-table.th>Invoice Date</x-table.th>
                        <x-table.th>Due Date</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($invoices as $invoice)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                <span class="flex items-center gap-3">
                                    {{ $invoice->name }}
                                </span>
                                <span class="flex items-center gap-3 text-xs opacity-60">
                                    {{ $invoice->job->name }}
                                </span>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                <span class="flex items-center gap-3 text-xs">
                                    <img src="{{ $invoice->job->client->logo }}" class="w-6 h-6 rounded">
                                    <span class="opacity-60">
                                        {{ $invoice->job->client->name }}
                                    </span>
                                </span>
                            </x-table.td>
                            <x-table.td class="opacity-80">
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                <x-ui.pill type="invoice-status" :invoice_status="$invoice->status">{{ $invoice->status }}</x-ui.pill>
                            </x-table.td>
                            <x-table.td class="opacity-80 font-semibold">
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                £{{ number_format($invoice->amount) }}
                            </x-table.td>
                            <x-table.td class="opacity-80 text-xs">
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                {{ date_format(date_create($invoice->invoice_date), 'd M Y') }}
                            </x-table.td>
                            <x-table.td class="opacity-80 text-xs">
                                <x-table.row-link href="/invoices/{{ $invoice->id }}" />
                                {{ date_format(date_create($invoice->due_date), 'd M Y') }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

        <div class="mt-4">
            {{ $invoices->links() }}
        </div>

    </div>

</x-layouts.auth>
