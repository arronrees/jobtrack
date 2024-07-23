@props(['for', 'text'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'font-medium text-sm']) }}>{{ $text }}</label>
