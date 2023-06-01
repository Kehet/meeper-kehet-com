@props(['value'])

<label {{ $attributes->merge(['class' => 'leading-7  text-gray-600 dark:text-gray-400']) }}>
    {{ $value ?? $slot }}
</label>
