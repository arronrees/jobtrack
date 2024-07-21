<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/jobs" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Jobs
            </a>
        </div>

        <div class="flex items-center gap-4">
            <div>
                <h1 class="text-2xl font-semibold mb-2">{{ $job->name }}</h1>
                <div class="flex gap-2 text-sm">
                    <span class="px-2 py-1 rounded bg-orange-100 text-orange-800">{{ $job->status }}</span>
                    <span class="px-2 py-1 rounded bg-blue-100 text-blue-800">{{ $job->type }}</span>
                </div>
            </div>
            <div class="flex gap-2 flex-col ml-auto">
                <a href="/jobs/{{ $job->id }}/edit" class="rounded py-2 px-4 bg-slate-300">Edit</a>
            </div>
        </div>

        <div class="mt-16 text-sm flex flex-col gap-3">
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Notes</div>
                <div class="font-light">{{ $job->notes }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Type</div>
                <div class="font-light">{{ $job->type }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Status</div>
                <div class="font-light">{{ $job->status }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Cost</div>
                <div class="font-light">£{{ number_format($job->cost) }}</div>
            </div>
            <hr>
            <div class="grid grid-cols-[10rem,1fr]">
                <div class="opacity-80 font-medium">Due Date</div>
                <div class="font-light">{{ date_format(date_create($job->due_date), 'd M Y') }}</div>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="font-semibold text-lg mb-4 pb-1 border-b-2 border-slate-100">Invoices</h2>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Date</x-table.th>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Notes</x-table.th>
                        <x-table.th>Amount</x-table.th>
                    </x-table.trh>
                </x-table.thead>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
