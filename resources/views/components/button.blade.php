@props(['type' => 'default', 'size' => 'md'])

@php

$class = 'lg:mt-2 xl:mt-0 flex-shrink-0 text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded';

switch ($type) {
    case 'block':
        $class .= ' w-full items-center';
}

switch ($size) {
    case 'lg':
        $class .= ' text-lg';
}

@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
    {{ $slot }}
</button>
