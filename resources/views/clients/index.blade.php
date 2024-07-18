<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Clients</h1>
            <a href="/clients/create"
                class="rounded py-2 px-4 bg-slate-600 hover:bg-slate-700 border transition text-white shadow">Add
                Client</a>
        </div>

        <div>
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b-2 border-slate-200 opacity-60">
                        <th class="pb-1 font-semibold">Name</th>
                        <th class="pb-1 font-semibold">Contact Name</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($clients as $client)
                        <tr class="border-b border-slate-100 transition hover:bg-slate-50">
                            <td class="py-3 font-medium relative">
                                <a class="w-full h-full block absolute top-0 left-0"
                                    href="/clients/{{ $client->id }}"></a>
                                <span class="flex items-center gap-3">
                                    <img src="{{ $client->logo }}" class="w-6 h-6 rounded-full">
                                    {{ $client->name }}
                                </span>
                            </td>
                            <td class="py-3 font-light opacity-80 relative">
                                <a class="w-full block absolute top-0 left-0" href="/clients/{{ $client->id }}"></a>
                                {{ $client->contact_name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-layouts.auth>
