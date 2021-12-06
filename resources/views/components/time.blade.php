@props(['time'])

<abbr title="{{ $time->format('d.m.Y H:i:s') }}">
    <time datetime="{{ $time->toIso8601String() }}">
        {{ $time->diffForHumans() }}
    </time>
</abbr>
