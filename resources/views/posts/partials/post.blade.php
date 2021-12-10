<div class="py-8 flex dark:border-t-2 dark:border-gray-800 flex-wrap md:flex-nowrap">
    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
        <span class="font-semibold title-font text-gray-700 dark:text-white">CATEGORY</span>
        <div class="mt-1 text-gray-500 text-sm">
            <x-time :time="$post->created_at"/>
        </div>

        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="mt-1">

                <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('posts.edit', [$post->id]) }}"
                       class="text-yellow-500 dark:text-yellow-400 inline-flex items-center mt-4">
                        {{ __('Edit') }}
                    </a> |
                    <a href="" class="text-yellow-500 dark:text-yellow-400 inline-flex items-center mt-4"
                       onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Delete') }}</a>
                </form>
            </div>
        @endif
    </div>
    <div class="md:flex-grow">
        @if(isset($post->title))
            <h2 class="text-2xl font-medium text-gray-900 dark:text-white title-font mb-2">
                {{ $post->title }}
            </h2>
        @endisset
        <div class="leading-relaxed">
            {!! $post->html !!}
        </div>
        @if($preview ?? true)
            <a href="{{ route('posts.show', [$post->id]) }}"
               class="text-yellow-500 dark:text-yellow-400 inline-flex items-center mt-4">
                {{ __('Read More') }}
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
        @endif

        <div class="mt-3">
            @foreach($post->tags as $tag)
                <a href="{{ route('search', ['query' => $tag->name]) }}"
                   class="text-white rounded text-xs
            bg-yellow-500 hover:bg-yellow-600 duration-300
            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1">
                    <i class="mdi mdi-cloud-outline mr-2"></i>
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

    </div>
</div>
