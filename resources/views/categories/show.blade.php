<x-app-layout>
    <div class="container px-5 py-24 mx-auto">

        <x-header>
            {{ __('Category ":category"', ['category' => $category->name]) }}
        </x-header>

        <div class="-my-8 divide-y-2 divide-gray-100 dark:divide-gray-800">
            @each('posts.partials.post', $category->posts, 'post', 'posts.partials.empty')
        </div>
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
