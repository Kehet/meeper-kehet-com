<div class="py-8 flex dark:border-t-2 dark:border-gray-800 flex-wrap md:flex-nowrap">
    <div class="w-32 md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
        <a href="{{ route('categories.show', [$post->category]) }}"
           class=" title-font text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center">
            {{ $post->category->name }}
        </a>
        <div class="mt-1 text-gray-500 ">
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

        @if(isset($post->url))
            <a href="{{ $post->url }}" class="text-lg font-medium text-yellow-500 dark:text-yellow-400 hover:underline mb-2">
                {{ $post->url }}
            </a>
        @endisset

        @if($post->hasMedia())
            @foreach($post->getMedia() as $media)
                <div class="mb-2">
                    <a href="{{ $media->getFullUrl() }}">
                        {{ $media()->lazy()->attributes(['class' => 'w-full max-h-96 object-top object-cover object-center']) }}
                    </a>
                </div>
            @endforeach
        @endisset

        <div class="leading-relaxed">
            {!! $post->html !!}
        </div>

        <div class="mt-3">
            @foreach($post->tags as $tag)
                <a href="{{ route('tags.show', ['tag' => $tag->name]) }}"
                   class="text-white dark:text-gray-900 rounded
            bg-yellow-500 hover:bg-yellow-600 duration-300
            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1">
                   {{ $tag->name }}
                </a>
            @endforeach
        </div>

    </div>
</div>
