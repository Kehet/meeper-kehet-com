@props(['post'])

<form method="POST" action="{{ route('posts.destroy', [$post]) }}" class="inline ">
    @csrf
    @method('DELETE')

    <a href=""
       class="font-medium text-brand-600 hover:text-brand-400 dark:text-brand-400 dark:hover:text-brand-300"
       onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Delete') }}</a>
</form>
