@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full bg-gray-100 dark:bg-gray-800 bg-opacity-50 dark:bg-opacity-40 rounded border border-gray-300 dark:border-gray-700 focus:bg-transparent focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500 dark:focus:ring-yellow-900 dark:focus:border-yellow-500 text-base outline-none text-gray-700 dark:text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out']) !!}>{{ $attributes->get('value') }}</textarea>
