<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Clients</h1>
            @can('create', App\Models\Client::class)
                <a href="/clients/create" class="btn--add">Add Client</a>
            @endcan
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?sort_by=name&sort={{ $current_sort_by === 'name' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
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
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?sort_by=contact_name&sort={{ $current_sort_by === 'contact_name' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Contact
                                @if ($current_sort_by === 'contact_name')
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
                                href="{{ url()->current() }}?sort_by=contact_email&sort={{ $current_sort_by === 'contact_email' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Email
                                @if ($current_sort_by === 'contact_email')
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
                            Telephone
                        </x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($clients as $client)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                <span class="flex items-center gap-3">
                                    <img src="/{{ $client->logo }}" class="w-6 h-6 rounded">
                                    {{ $client->name }}
                                </span>
                            </x-table.td>
                            <x-table.td class="opacity-80">
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                {{ $client->contact_name }}
                            </x-table.td>
                            <x-table.td class="opacity-60">
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                {{ $client->contact_email }}
                            </x-table.td>
                            <x-table.td class="opacity-60">
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                {{ $client->contact_telephone }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

        <div class="mt-4">
            {{ $clients->links() }}
        </div>

    </div>

</x-layouts.auth>
