<x-app-layout>
    <main id="page-content" class="flex max-w-full flex-auto flex-col">
        <div class="bg-gray-50 dark:bg-gray-800/50">
            <div class="container mx-auto p-4 lg:p-8 xl:max-w-7xl">
                <div
                    class="space-y-2 py-2 text-center sm:flex sm:items-center sm:justify-between sm:space-y-0 sm:text-left lg:py-0"
                >
                    <div class="grow">
                        <h1 class="mb-1 text-xl font-bold">Posts</h1>
                    </div>
                    @auth
                        <div
                            class="flex flex-none items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0"
                        >
                            <a
                                href="{{ route('posts.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-lg border border-brand-700 bg-brand-700 px-3 py-2 text-sm leading-5 font-semibold text-white hover:border-brand-600 hover:bg-brand-600 hover:text-white focus:ring-3 focus:ring-brand-400/50 active:border-brand-700 active:bg-brand-700 dark:focus:ring-brand-400/90"
                            >
                                <svg
                                    class="hi-mini hi-plus inline-block size-5 opacity-50"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"
                                    />
                                </svg>
                                <span>New Post</span>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
            <div
                class="container mx-auto space-y-16 px-4 py-16 lg:px-8 lg:py-32 xl:max-w-7xl"
            >
                <div class="space-y-4 sm:space-y-10">
                    @each('posts.partials.post', $posts, 'post', 'posts.partials.empty')
                </div>

                {{ $posts->links() }}
            </div>

        </div>

    </main>
</x-app-layout>
