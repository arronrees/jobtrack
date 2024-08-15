<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Jobs</h1>
            @if (request()->is('jobs/archive'))
                <a href="/jobs" class="btn--outline ml-auto">Current Jobs</a>
            @else
                <a href="/jobs/archive" class="btn--outline ml-auto">Archived Jobs</a>
            @endif
            @can('create', App\Models\Job::class)
                <a href="/jobs/create" class="btn--add">Add
                    Job</a>
            @endcan
        </div>

        <div class="flex gap-4 mb-6">
            <div class="flex flex-col gap-2">
                <p class="text-xs font-medium opacity-60">Filter By Status</p>
                <div class="flex gap-2 flex-wrap">
                    @foreach ($statuses as $status)
                        <a href="{{ url()->current() }}?status={{ $status->value }}&type={{ $current_type }}&sort={{ $current_sort }}&sort_by={{ $current_sort_by }}"
                            class="text-xs rounded-full px-2 py-1 border border-slate-200 transition hover:bg-slate-200 {{ $current_status === $status->value ? 'bg-slate-200' : '' }}">{{ $status->value }}</a>
                    @endforeach
                </div>
                <div>
                    <a href="{{ url()->current() }}?status=&type={{ $current_type }}&sort={{ $current_sort }}&sort_by={{ $current_sort_by }}"
                        class="text-xs opacity-50 transition hover:opacity-70 border-b border-transparent hover:border-slate-500">Clear</a>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-xs font-medium opacity-60">Filter By Type</p>
                <div class="flex gap-2 flex-wrap">
                    @foreach ($types as $type)
                        <a href="{{ url()->current() }}?status={{ $current_status }}&type={{ $type->value }}&sort={{ $current_sort }}&sort_by={{ $current_sort_by }}"
                            class="text-xs rounded-full px-2 py-1 border border-slate-200 transition hover:bg-slate-200 {{ $current_type === $type->value ? 'bg-slate-200' : '' }}">{{ $type->value }}</a>
                    @endforeach
                </div>
                <div>
                    <a href="{{ url()->current() }}?status={{ $current_status }}&type=&sort={{ $current_sort }}&sort_by={{ $current_sort_by }}"
                        class="text-xs opacity-50 transition hover:opacity-70 border-b border-transparent hover:border-slate-500">Clear</a>
                </div>
            </div>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>User</x-table.th>
                        <x-table.th>
                            <a class="flex gap-2 items-center w-full h-full"
                                href="{{ url()->current() }}?status={{ $current_status }}&type={{ $current_type }}&sort_by=name&sort={{ $current_sort_by === 'name' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
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
                                href="{{ url()->current() }}?status={{ $current_status }}&type={{ $current_type }}&sort_by=type&sort={{ $current_sort_by === 'type' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Type
                                @if ($current_sort_by === 'type')
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
                                href="{{ url()->current() }}?status={{ $current_status }}&type={{ $current_type }}&sort_by=status&sort={{ $current_sort_by === 'status' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
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
                                href="{{ url()->current() }}?status={{ $current_status }}&type={{ $current_type }}&sort_by=cost&sort={{ $current_sort_by === 'cost' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
                                Cost
                                @if ($current_sort_by === 'cost')
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
                                href="{{ url()->current() }}?status={{ $current_status }}&type={{ $current_type }}&sort_by=due_date&sort={{ $current_sort_by === 'due_date' && $current_sort === 'asc' ? 'desc' : 'asc' }}">
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
                    @foreach ($jobs as $job)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/jobs/{{ $job->id }}" />
                                <img src="/{{ $job->user->avatar_url }}" class="w-6 h-6 rounded">
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
