@error($field)
    <div {{ $attributes->merge(['class' => 'leading-7 text-sm text-red-600 dark:text-red-400']) }}>
        {{ $slot->isEmpty() ? $message : $slot }}
    </div>
@enderror
