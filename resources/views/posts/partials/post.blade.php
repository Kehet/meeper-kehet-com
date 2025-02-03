<div
    class="flex flex-col overflow-hidden rounded-lg bg-white shadow-xs lg:flex-row dark:bg-gray-800"
>
    @if($post->hasMedia('*'))
    <a
        href="{{ $post->getFirstMedia('*')->getFullUrl() }}"
        class="group relative block w-full overflow-hidden lg:w-2/5 xl:w-1/3"
    >
        <div
            class="absolute inset-0 flex items-center justify-center bg-brand-700/75 opacity-0 transition duration-150 ease-out group-hover:opacity-100"
        >
            <svg
                class="hi-solid hi-arrow-right inline-block size-10 -rotate-45 text-white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    fill-rule="evenodd"
                    d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
            {{ $post->getFirstMedia('*')()->attributes(['class' => 'h-full w-full object-cover object-center']) }}
    </a>
    @endisset
    <div
        class="w-full p-6 lg:w-3/5 lg:self-center lg:px-10 lg:py-8 xl:w-2/3"
    >

        <p class="mb-3 text-sm text-gray-600 dark:text-gray-400">
            Kehet
            <x-time :time="$post->created_at"/>
        </p>

        <h2>
            <a
                href="{{ route('categories.show', [$post->category]) }}"
                class="leading-7 text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400"
            >
                {{ $post->category->name }}
            </a>
        </h2>

        @if(isset($post->title))
        <h1 class="mb-2 text-lg font-bold sm:text-xl leading-7 text-gray-800 dark:text-gray-200">
            {{ $post->title }}
        </h1>
        @endisset

        @if(isset($post->url))
            <h2>
                <a href="{{ $post->url }}"
                    class="leading-7 text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400">
                    {{ $post->url }}
                </a>
            </h2>
        @endisset

        <p class="mt-3 leading-relaxed text-gray-600 dark:text-gray-400">
            {!! $post->html !!}
        </p>

        <div class="mt-3 inline-flex flex-wrap items-center gap-1">
            @foreach($post->tags as $tag)
                <a href="{{ route('tags.show', ['tag' => $tag->name]) }}"
                   class="inline-flex rounded-full bg-brand-100 px-2 py-1 text-sm leading-4 font-semibold text-brand-800 dark:bg-brand-900/75 dark:text-brand-200">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        @auth
            <p class="mt-3">
                <x-retake-screenshot-button :post="$post" /> |
                <a href="{{ route('posts.edit', [$post]) }}"
                   class="font-medium text-brand-600 hover:text-brand-400 dark:text-brand-400 dark:hover:text-brand-300">
                    {{ __('Edit') }}
                </a> |
                <x-delete-post-button :post="$post" />
            </p>
        @endauth
    </div>
</div>
