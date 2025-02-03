@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex items-center gap-2 rounded-lg border border-transparent bg-gray-700/75 px-3 py-2 text-sm font-semibold text-white'
            : 'group flex items-center gap-2 rounded-lg border border-transparent px-3 py-2 text-sm font-medium text-gray-200 hover:bg-gray-700 hover:text-white active:border-gray-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
