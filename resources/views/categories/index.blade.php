<x-app-layout>
    <main id="page-content" class="flex max-w-full flex-auto flex-col">
        <div class="bg-gray-50 dark:bg-gray-800/50">
            <div class="container mx-auto p-4 lg:p-8 xl:max-w-7xl">
                <div
                    class="space-y-2 py-2 text-center sm:flex sm:items-center sm:justify-between sm:space-y-0 sm:text-left lg:py-0"
                >
                    <div class="grow">
                        <h1 class="mb-1 text-xl font-bold">Categories</h1>
                    </div>
                    @auth
                        <div
                            class="flex flex-none items-center justify-center gap-2 rounded-sm px-2 py-3 sm:justify-end sm:bg-transparent sm:px-0"
                        >
                            <a
                                href="{{ route('categories.create') }}"
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
                                <span>{{ __('New category') }}</span>
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
                <div
                    class="min-w-full overflow-x-auto rounded-sm border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
                >
                    <table class="min-w-full align-middle text-sm whitespace-nowrap">
                        <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-700/50">
                            <th
                                class="bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50"
                            >
                                Name
                            </th>
                            <th
                                class="bg-gray-100/75 px-3 py-4 text-left font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50"
                            >
                                Posts
                            </th>
                            <th
                                class="bg-gray-100/75 px-3 py-4 text-center font-semibold text-gray-900 dark:bg-gray-700/25 dark:text-gray-50"
                            >
                                Actions
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr class="border-b border-gray-100 dark:border-gray-700/50">
                                <td class="p-3">
                                    <a href="{{ route('categories.show', [$category]) }}"
                                       class="text-brand-500 dark:text-brand-400 hover:underline inline-flex items-center">
                                        {{ $category->name }}
                                    </a>
                                </td>
                                <td class="p-3 text-gray-500 dark:text-gray-400">
                                    {{ $category->posts_count }}
                                </td>
                                <td class="p-3 text-center">
                                    <a href="{{ route('categories.edit', [$category]) }}"
                                       class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-2 py-1 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
