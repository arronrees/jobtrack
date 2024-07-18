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
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b-2 border-slate-200/50 opacity-60">
                        <th class="pb-1 font-semibold">Job Name</th>
                        <th class="pb-1 font-semibold">User</th>
                        <th class="pb-1 font-semibold">Status</th>
                        <th class="pb-1 font-semibold">Cost</th>
                    </tr>
                </thead>
                <tbody class="text-sm">

                </tbody>
            </table>
        </div>

    </div>

</x-layouts.auth>
