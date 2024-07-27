<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Users</h1>
            <a href="/users/create" class="btn--add">Add
                User</a>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.trh>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Email</x-table.th>
                        <x-table.th>Role</x-table.th>
                    </x-table.trh>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($users as $user)
                        <x-table.tr>
                            <x-table.td>
                                <x-table.row-link href="/users/{{ $user->id }}" />
                                <span class="flex items-center gap-3">
                                    @if ($user->avatar_url)
                                        <img src="/{{ $user->avatar_url }}" class="w-6 h-6 rounded">
                                    @else
                                        <span
                                            class="font-semibold rounded border border-slate-300 w-6 h-6 flex items-center justify-center">{{ substr($user->name, 0, 1) }}</span>
                                    @endif
                                    {{ $user->name }}
                                </span>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/users/{{ $user->id }}" />
                                {{ $user->email }}
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/users/{{ $user->id }}" />
                                <x-ui.pill type="user-role" :user_role="$user->role">{{ $user->role }}</x-ui.pill>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
