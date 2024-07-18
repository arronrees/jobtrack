<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/clients" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Clients
            </a>
        </div>

        <div class="flex items-center gap-4">
            <div>
                <img src="{{ $client->logo }}" class="w-40 h-24 object-cover object-center rounded-lg" alt="">
            </div>
            <div>
                <h1 class="text-2xl font-semibold mb-1">{{ $client->name }}</h1>
                <p class="opacity-70">32 London Bridge Street, London, SW19</p>
            </div>
            <div class="flex gap-2 flex-col ml-auto">
                <a href="/clients/{{ $client->id }}/edit" class="rounded py-2 px-4 bg-slate-300">Edit</a>
            </div>
        </div>

        <div class="mt-16">
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Job Name</x-table.th>
                        <x-table.th>User</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Cost</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    <x-table.tr>
                        <x-table.td>Update banner</x-table.td>
                    </x-table.tr>
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
