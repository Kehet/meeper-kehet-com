<x-app-layout>
    <div class="container px-5 py-24 mx-auto">

        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <x-header>
                {{ __('New Post') }}
            </x-header>

            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                @include('posts.partials.form', ['post' => $post])

                <div class="p-2 w-full">
                    <x-button type="block">{{ __('Create') }}</x-button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>
