<footer class="text-gray-600 dark:text-gray-400 dark:bg-gray-900 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap md:text-left text-center order-first">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 dark:text-white tracking-widest text-sm mb-3">
                    CATEGORIES
                </h2>
                <nav class="list-none mb-10">
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white dark:text-gray-400 dark:hover:text-white">First
                            Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Second Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Third Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Fourth Link</a>
                    </li>
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 dark:text-white tracking-widest text-sm mb-3">
                    CATEGORIES
                </h2>
                <nav class="list-none mb-10">
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">First Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Second Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Third Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Fourth Link</a>
                    </li>
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 dark:text-white tracking-widest text-sm mb-3">
                    CATEGORIES
                </h2>
                <nav class="list-none mb-10">
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">First Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Second Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Third Link</a>
                    </li>
                    <li>
                        <a class="dark:text-gray-400 dark:hover:text-white">Fourth Link</a>
                    </li>
                </nav>
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
            <p class="text-sm text-gray-500 dark:text-gray-400 sm:ml-6 sm:mt-0 mt-4">
                &copy; {{ date('Y') }} Kehet
            </p>
        </div>
    </div>
</footer>
