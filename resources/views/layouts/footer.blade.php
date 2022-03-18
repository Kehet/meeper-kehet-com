<footer class="text-gray-600 dark:text-gray-400 dark:bg-gray-900 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap md:text-left text-center order-first">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 dark:text-white tracking-widest  mb-3">
                    TAGS
                </h2>
                <nav class="list-none mb-10">
                    @foreach($tags as $tag)
                        <li>
                            <a href="{{ route('search', ['query' => $tag->name]) }}"
                               class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center">
                                {{ $tag->name }}
                            </a>
                            <span class="text-gray-500 text-sm">
                                {{ $tag->count }} posts
                            </span>
                        </li>
                    @endforeach
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 dark:text-white tracking-widest  mb-3">
                    LATEST
                </h2>
                <nav class="list-none mb-10">
                    @foreach($latest as $post)
                        <li>
                            <a href="{{ route('posts.show', [$post->id]) }}"
                               class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center">
                                {{ $post->title }}
                            </a>
                            <span class="text-gray-500 text-sm">
                                <x-time :time="$post->created_at"/>
                            </span>
                        </li>
                    @endforeach
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam beatae consequatur cum, distinctio ea labore magnam magni mollitia nisi porro quam tempore ut. Accusamus, consectetur dignissimos maxime non reprehenderit rerum?
                </p>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <x-search class="mx-3" />
            </div>
        </div>
    </div>
    <div class="bg-gray-100 dark:bg-gray-800 dark:bg-opacity-75">
        <div class="container px-5 py-6 mx-auto flex items-center justify-between sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900 dark:text-white">
                <x-application-logo/>
                <span class="ml-3 text-xl">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <p class=" text-gray-500 dark:text-gray-400 sm:ml-6 sm:mt-0 mt-4">
                &copy; {{ date('Y') }} Kehet
            </p>
        </div>
    </div>
</footer>
