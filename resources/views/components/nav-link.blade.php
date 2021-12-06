@props(['active'])

@php
$classes = ($active ?? false)
            ? 'mr-5 text-yellow-500 hover:text-yellow-600'
            : 'mr-5 hover:text-yellow-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
