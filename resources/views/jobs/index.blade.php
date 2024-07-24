<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Jobs</h1>
            <a href="/jobs/create" class="btn--add">Add
                Job</a>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>User</x-table.th>
                        <x-table.th>Name</x-table.th>
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
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <img src="{{ $job->user->avatar_url }}" class="w-6 h-6 rounded">
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <span class="flex items-center gap-3">
                                    {{ $job->name }}
                                </span>
                                <span class="flex items-center gap-3 text-xs  opacity-60">
                                    {{ $job->client->name }}
                                </span>
                            </x-table.td>
                            <x-table.td class="opacity-80">
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <x-ui.pill type="job-type" :job_type="$job->type">{{ $job->type }}</x-ui.pill>
                            </x-table.td>
                            <x-table.td class="opacity-80">
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <x-ui.pill type="job-status" :job_status="$job->status">{{ $job->status }}</x-ui.pill>
                            </x-table.td>
                            <x-table.td class="opacity-80 font-semibold">
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                £{{ number_format($job->cost) }}
                            </x-table.td>
                            <x-table.td class="opacity-80 text-xs">
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                {{ date_format(date_create($job->due_date), 'd M Y') }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

        <div class="mt-4">
            {{ $jobs->links() }}
        </div>

    </div>

</x-layouts.auth>
