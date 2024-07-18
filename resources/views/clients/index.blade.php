<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Clients</h1>
            <a href="/clients/create"
                class="rounded py-2 px-4 bg-slate-600 hover:bg-slate-700 border transition text-white shadow">Add
                Client</a>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Contact Name</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($clients as $client)
                        <x-table.tr>
                            <x-table.td>
                                <a class="w-full h-full block absolute top-0 left-0"
                                    href="/clients/{{ $client->id }}"></a>
                                <span class="flex items-center gap-3">
                                    <img src="{{ $client->logo }}" class="w-6 h-6 rounded-full">
                                    {{ $client->name }}
                                </span>
                            </x-table.td>
                            <x-table.td class="font-light opacity-80">
                                <a class="w-full block absolute top-0 left-0" href="/clients/{{ $client->id }}"></a>
                                {{ $client->contact_name }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
