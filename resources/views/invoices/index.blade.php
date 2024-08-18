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
                        <a href="{{ url()->current() }}?status={{ $status->value }}&sort={{ $current_sort }}&sort_by={{ $current_sort_by }}"
                            class="text-xs rounded-full px-2 py-1 border border-slate-200 transition hover:bg-slate-200 {{ $current_status === $status->value ? 'bg-slate-200' : '' }}">{{ $status->value }}</a>
                    @endforeach
                </div>
                <div>
                    <a href="{{ url()->current() }}?status=&sort={{ $current_sort }}&sort_by={{ $current_sort_by }}"
                        class="text-xs opacity-50 transition hover:opacity-70 border-b border-transparent hover:border-slate-500">Clear</a>
                </div>
            </div>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?status={{ $current_status }}&sort_by=name&sort={{ $current_sort_by === 'name' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Name
                                @if ($current_sort_by === 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-3 h-3 {{ $current_sort === 'desc' ? 'rotate-180' : '' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </a>
                        </x-table.th>
                        <x-table.th>
                            Client
                        </x-table.th>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?status={{ $current_status }}&sort_by=status&sort={{ $current_sort_by === 'status' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Status
                                @if ($current_sort_by === 'status')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-3 h-3 {{ $current_sort === 'desc' ? 'rotate-180' : '' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </a>
                        </x-table.th>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?status={{ $current_status }}&sort_by=amount&sort={{ $current_sort_by === 'amount' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Amount
                                @if ($current_sort_by === 'amount')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-3 h-3 {{ $current_sort === 'desc' ? 'rotate-180' : '' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </a>
                        </x-table.th>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?status={{ $current_status }}&sort_by=invoice_date&sort={{ $current_sort_by === 'invoice_date' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Invoice Date
                                @if ($current_sort_by === 'invoice_date')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-3 h-3 {{ $current_sort === 'desc' ? 'rotate-180' : '' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </a>
                        </x-table.th>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?status={{ $current_status }}&sort_by=due_date&sort={{ $current_sort_by === 'due_date' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Due Date
                                @if ($current_sort_by === 'due_date')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-3 h-3 {{ $current_sort === 'desc' ? 'rotate-180' : '' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </a>
                        </x-table.th>
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
                                    <img src="/{{ $invoice->job->client->logo }}" class="w-6 h-6 rounded">
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
