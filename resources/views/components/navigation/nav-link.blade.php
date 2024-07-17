@props(['text', 'href', 'active' => false])

<a class="flex gap-2 items-center rounded p-2 transition hover:bg-slate-200/50 focus:bg-slate-200/50 {{ $active ? 'font-semibold bg-slate-200/50' : '' }}"
    href="{{ $href }}">
    {{ $slot }}
    <span>{{ $text }}</span>
</a>
