<x-app-layout>
    <div class="container px-5 py-24 mx-auto">

        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <x-header>
                {{ __('Edit category') }}
                <x-slot name="description">
                    {{ $category->title }}
                </x-slot>
            </x-header>

            <form action="{{ route('categories.update', [$category]) }}" method="post">

                @csrf
                @method('PUT')

                @include('categories.partials.form', compact('category'))

                <div class="p-2 w-full">
                    <x-button type="block">{{ __('Update') }}</x-button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>
