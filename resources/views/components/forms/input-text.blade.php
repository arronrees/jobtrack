@props(['name', 'id', 'placeholder' => '', 'required' => false, 'type' => 'text', 'value' => ''])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}
    value="{{ $value }}" placeholder="{{ $placeholder }}"
    class="block w-full rounded-md border-slate-300 shadow-sm text-sm focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50 py-1 placeholder:opacity-60" />
