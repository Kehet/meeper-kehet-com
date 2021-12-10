<x-app-layout>
    <div class="container px-5 py-24 mx-auto">

        <x-header>
            {{ __('Search results for ":query"', compact('query')) }}
        </x-header>


        @if($showResults)
            <div class="-my-8 divide-y-2 divide-gray-100 dark:divide-gray-800">
                @each('posts.partials.post', $results, 'post', 'search.partials.empty')
            </div>
            <div class="mt-6">
                {{ $results->links() }}
            </div>
        @else
            <i>Too short search</i>
        @endif
    </div>
</x-app-layout>
