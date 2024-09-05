<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <x-navigation.back-btn href="/users" text="Users" />
        </div>

        <div class="flex items-center gap-4">
            <div>
                <img src="/{{ $user->avatar_url }}" class="w-40 h-24 object-cover object-center rounded-lg" alt="">
            </div>
            <div>
                <h1 class="text-2xl font-semibold mb-1">{{ $user->name }}</h1>
                <p class="opacity-70 mb-1">{{ $user->email }}</p>
                <x-ui.pill type="user-role" :user_role="$user->role">{{ $user->role }}</x-ui.pill>
            </div>
            @can('update', $user)
                <div class="flex gap-2 flex-col ml-auto">
                    <a href="/users/{{ $user->id }}/edit" class="btn--edit">Edit</a>
                </div>
            @endcan
        </div>

        <div class="mt-16">
            <h2 class="font-semibold text-lg mb-4 pb-1 border-b-2 border-slate-100">Jobs</h2>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Job Name</x-table.th>
                        <x-table.th>Type</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Cost</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($user->jobs as $job)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <span class="flex items-center gap-3">
                                    {{ $job->name }}
                                </span>
                                <span class="flex items-center gap-3 text-xs opacity-60">
                                    {{ $job->client->name }}
                                </span>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <x-ui.pill type="job-type" :job_type="$job->type">{{ $job->type }}</x-ui.pill>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <x-ui.pill type="job-status" :job_status="$job->status">{{ $job->status }}</x-ui.pill>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                £{{ number_format($job->cost) }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
