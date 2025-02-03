<form action="{{ route('search') }}" method="get" {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <input
        type="search"
        name="query"
        placeholder="{{ __('Search...') }}"
        class="block w-full grow rounded-l-lg border border-gray-200 px-3 py-2 leading-6 placeholder-gray-500 focus:z-1 focus:border-brand-500 focus:ring-3 focus:ring-brand-500/50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-brand-500"
    />
    <button
        type="submit"
        class="cursor-pointer -ml-px inline-flex flex-none items-center justify-center gap-2 rounded-r-lg border border-brand-700 bg-brand-700 px-4 py-2 leading-6 font-semibold text-white hover:border-brand-600 hover:bg-brand-600 hover:text-white focus:ring-3 focus:ring-brand-400/50 active:border-brand-700 active:bg-brand-700 dark:focus:ring-brand-400/90"
    >
        {{ __('Search') }}
    </button>
</form>
