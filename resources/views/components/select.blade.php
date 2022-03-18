@props(['disabled' => false, 'options' => []])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500 text-base pl-3 pr-10 dark:bg-transparent dark:border-gray-700 dark:focus:ring-yellow-900']) !!}>
@foreach($options as $key => $value)
        <option value="{{ $key }}" {!! $attributes->except(['key', 'value']) !!}>{{ $value }}</option>
@endforeach
</select>
