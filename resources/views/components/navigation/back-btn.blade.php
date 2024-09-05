@props(['text', 'href'])

<a href="{{ $href }}" class="p-2 flex items-center gap-2 rounded hover:bg-gray-50 transition">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4 stroke-black">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
    </svg>
    {{ $text }}
</a>
