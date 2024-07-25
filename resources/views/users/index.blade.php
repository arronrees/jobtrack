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
                                <x-table.row-link href="/users/{{ $user->id }}/edit" />
                                <span class="flex items-center gap-3">
                                    <img src="{{ $user->avatar_url }}" class="w-6 h-6 rounded">
                                    {{ $user->name }}
                                </span>
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/users/{{ $user->id }}/edit" />
                                {{ $user->email }}
                            </x-table.td>
                            <x-table.td>
                                <x-table.row-link href="/users/{{ $user->id }}/edit" />
                                {{ $user->role }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>

    </div>

</x-layouts.auth>
