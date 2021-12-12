<div class="py-8 flex dark:border-t-2 dark:border-gray-800 flex-wrap md:flex-nowrap">
    <div class="w-32 md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
        <span class="font-semibold title-font text-gray-700 dark:text-white">CATEGORY</span>
        <div class="mt-1 text-gray-500 text-sm">
            <x-time :time="$post->created_at"/>
        </div>

        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="mt-1">
                <x-delete-post-button :post="$post" />
            </div>
        @endif
    </div>
    <div class="md:flex-grow">
        @if(isset($post->title))
            <h2 class="text-2xl font-medium text-gray-900 dark:text-white title-font mb-2">
                {{ $post->title }}
            </h2>
        @endisset

        @if($post->hasMedia())
            <div class="mb-2">
                <a href="{{ $post->getFirstMedia()->getFullUrl() }}">
                    {{ $post->getFirstMedia()()->lazy()->attributes(['class' => 'w-full object-cover h-full object-center']) }}
                </a>
            </div>
        @endisset

        <div class="leading-relaxed">
            {!! $post->html !!}
        </div>

        <div class="mt-3">
            @foreach($post->tags as $tag)
                <a href="{{ route('search', ['query' => $tag]) }}"
                   class="text-white rounded text-xs
            bg-yellow-500 hover:bg-yellow-600 duration-300
            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1">
                   {{ $tag }}
                </a>
            @endforeach
        </div>

    </div>
</div>
