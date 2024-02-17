<x-app-layout>
    <div class="container px-5 py-24 mx-auto">

        <x-header>
            {{ __('All categories') }}
        </x-header>

        <div class="-my-8 divide-y-2 divide-gray-100 dark:divide-gray-800">

            <a href="{{ route('categories.create') }}"
               class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center mt-4">
                {{ __('New category') }}
            </a>

            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', [$category]) }}"
                           class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center">
                            {{ $category->name }}
                        </a>
                        <span class="text-gray-500 ">
                            {{ $category->posts_count }} posts
                        </span>

                        <a href="{{ route('categories.edit', [$category]) }}"
                           class="text-yellow-500 dark:text-yellow-400 hover:underline inline-flex items-center">
                            Edit
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>

    </div>
</x-app-layout>
