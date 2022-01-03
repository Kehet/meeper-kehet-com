@props(['post'])

<div class="mt-1">
    <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}">
        @csrf
        @method('DELETE')

        <a href="{{ route('posts.edit', [$post->id]) }}"
           class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center mt-4">
            {{ __('Edit') }}
        </a> |
        <a href="" class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center mt-4"
           onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Delete') }}</a>
    </form>
</div>
