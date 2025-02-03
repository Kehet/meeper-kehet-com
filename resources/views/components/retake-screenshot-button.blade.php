@props(['post'])

<form method="POST" action="{{ route('retake-screenshot', [$post]) }}" class="inline">
    @csrf
    <a href=""
       class="font-medium text-brand-600 hover:text-brand-400 dark:text-brand-400 dark:hover:text-brand-300"
       onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Retake Screenshot') }}</a>
</form>
