<form action="{{ route('search') }}" method="get" {{ $attributes->merge(['class' => 'py-3 md:py-0 md:ml-auto flex']) }}>
    <label>
        <span class="sr-only">Search term</span>
        <input type="search" name="query"
               class="w-full bg-gray-100 dark:bg-gray-800 bg-opacity-50 dark:bg-opacity-40 rounded-l border border-gray-300 dark:border-gray-700 focus:bg-transparent focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500 dark:focus:ring-yellow-900 dark:focus:border-yellow-500 text-base outline-none text-gray-700 dark:text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
               placeholder="{{ __('Search...') }}"/>
    </label>
    <button
        class="lg:mt-2 xl:mt-0 flex-shrink-0 text-white dark:text-gray-900 bg-yellow-500 border-0 py-2 px-4 focus:outline-none hover:bg-yellow-600 rounded-r transition ease-in-out duration-150">
        {{ __('Search') }}
    </button>
</form>
