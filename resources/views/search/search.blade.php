<x-app-layout>
    <div class="container px-5 py-24 mx-auto">

        <x-header>
            {{ __('Search results for ":query"', compact('query')) }}
        </x-header>

        <div class="-my-8 divide-y-2 divide-gray-100 dark:divide-gray-800">
            @if($showResults)
                @each('posts.partials.post', $results, 'post', 'search.partials.empty')
            @else
                <i>Too short search</i>
            @endif
        </div>
    </div>
</x-app-layout>
