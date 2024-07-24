@props(['name', 'id', 'required' => false, 'value' => ''])

<input type="date" name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}
    value="{{ $value }}"
    class="block w-full rounded-md border-slate-300 shadow-sm text-sm focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50 py-1 placeholder:opacity-60" />
