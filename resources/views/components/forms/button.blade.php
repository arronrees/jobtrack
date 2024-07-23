@props(['text'])

<button type="submit" {{ $attributes->merge(['class' => 'btn--save']) }}>{{ $text }}</button>
