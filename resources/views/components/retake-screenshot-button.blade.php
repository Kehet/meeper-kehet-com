@props(['post'])

<div class="mt-1">
    <form method="POST" action="{{ route('retake-screenshot', [$post]) }}">
        @csrf
        <a href="" class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center mt-4"
           onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Retake Screenshot') }}</a>
    </form>
</div>
