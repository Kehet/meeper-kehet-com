<footer
    id="page-footer"
    class="flex flex-none items-center bg-white dark:bg-gray-800"
>
    <div
        class="container mx-auto flex flex-col px-4 text-center text-sm md:flex-row md:justify-between md:text-left lg:px-8 xl:max-w-7xl"
    >
        <div class="pt-4 pb-1 md:pb-4">
            <h2>Tags</h2>

            @foreach($tags as $tag)
                <li class="list-none">
                    <a href="{{ route('tags.show', ['tag' => $tag->name]) }}"
                       class="text-brand-500 dark:text-brand-400 hover:underline inline-flex items-center">
                        {{ $tag->name }}
                    </a>
                    <span class="text-gray-500 ">
                        {{ $tag->count }} posts
                    </span>
                </li>
            @endforeach
        </div>

        <div class="pt-4 pb-1 md:pb-4">
            <h2>Categories</h2>

            @foreach($categories as $category)
                <li class="list-none">
                    <a href="{{ route('categories.show', [$category]) }}"
                       class="text-brand-500 dark:text-brand-400 hover:underline inline-flex items-center">
                        {{ $category->name }}
                    </a>
                    <span class="text-gray-500 ">
                        {{ $category->posts_count }} posts
                    </span>
                </li>
            @endforeach
        </div>

        <div class="pt-4 pb-1 md:pb-4">
            <x-search class="mx-3" />
        </div>

        <div class="pt-4 pb-1 md:pb-4">
            &copy; {{ date('Y') }} Kehet
        </div>
    </div>
</footer>
