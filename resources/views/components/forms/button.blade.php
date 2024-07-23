@props(['text'])

<button type="submit"
    {{ $attributes->merge(['class' => 'uppercase text-sm font-semibold text-white bg-slate-800 py-2 px-6 rounded']) }}>{{ $text }}</button>
