<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100 dark:divide-gray-800">
            @include('posts.partials.post', ['post' => $post, 'preview' => false,])
        </div>
    </div>
</x-app-layout>
