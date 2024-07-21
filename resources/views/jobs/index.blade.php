<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Jobs</h1>
            <a href="/jobs/create"
                class="rounded py-2 px-4 bg-slate-600 hover:bg-slate-700 border transition text-white shadow">Add
                Job</a>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>User</x-table.th>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Client</x-table.th>
                        <x-table.th>Type</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Cost</x-table.th>
                        <x-table.th>Due Date</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($jobs as $job)
                        <x-table.tr>
                            <x-table.td>
                                <a class="w-full h-full block absolute top-0 left-0" href="/jobs/{{ $job->id }}"></a>
                                {{ $job->user->name }}
                            </x-table.td>
                            <x-table.td>
                                <a class="w-full h-full block absolute top-0 left-0" href="/jobs/{{ $job->id }}"></a>
                                <span class="flex items-center gap-3">
                                    {{ $job->name }}
                                </span>
                            </x-table.td>
                            <x-table.td>
                                <a class="w-full h-full block absolute top-0 left-0"
                                    href="/jobs/{{ $job->id }}"></a>
                                <span class="flex items-center gap-3">
                                    {{ $job->client->name }}
                                </span>
                            </x-table.td>
                            <x-table.td class="font-light opacity-80">
                                <a class="w-full block absolute top-0 left-0" href="/jobs/{{ $job->id }}"></a>
                                {{ $job->type }}
                            </x-table.td>
                            <x-table.td class="font-light opacity-80">
                                <a class="w-full block absolute top-0 left-0" href="/jobs/{{ $job->id }}"></a>
                                {{ $job->status }}
                            </x-table.td>
                            <x-table.td class="font-light opacity-80">
                                <a class="w-full block absolute top-0 left-0" href="/jobs/{{ $job->id }}"></a>
                                £{{ number_format($job->cost) }}
                            </x-table.td>
                            <x-table.td class="font-light opacity-80">
                                <a class="w-full block absolute top-0 left-0" href="/jobs/{{ $job->id }}"></a>
                                {{ $job->due_date }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
