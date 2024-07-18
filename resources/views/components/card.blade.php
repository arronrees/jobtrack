@props(['bg' => 'bg-white'])

<div {{ $attributes->merge(['class' => "p-4 shadow-sm rounded $bg"]) }}>

    {{ $slot }}

</div>
