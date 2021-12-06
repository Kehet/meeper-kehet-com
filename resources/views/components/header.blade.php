<div class="flex flex-col w-full mb-12">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 dark:text-white">{{ $slot }}</h1>

    @isset($description)
        <p class="lg:w-2/3 leading-relaxed text-base">
            {{ $description }}
        </p>
    @endisset
</div>
