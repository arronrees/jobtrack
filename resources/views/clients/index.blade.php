<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Clients</h1>
            <a href="/clients/create" class="btn--add">Add
                Client</a>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Contact</x-table.th>
                        <x-table.th>Email</x-table.th>
                        <x-table.th>Telephone</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($clients as $client)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                <span class="flex items-center gap-3">
                                    <img src="{{ $client->logo }}" class="w-6 h-6 rounded">
                                    {{ $client->name }}
                                </span>
                            </x-table.td>
                            <x-table.td class="font-light opacity-80">
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                {{ $client->contact_name }}
                            </x-table.td>
                            <x-table.td class="font-light opacity-60">
                                <x-table.row-link href="/clients/{{ $client->id }}" />
                                {{ $client->contact_email }}
                            </x-table.td>
                            <x-table.td class="font-light opacity-60">
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
