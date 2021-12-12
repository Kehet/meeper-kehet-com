@props(['post'])

<div class="mt-1" x-data="{ showModal: false, toggleBackdrop(show = true) {
    if (show) {
        var backdropEl = document.createElement('div');
        backdropEl.setAttribute('modal-backdrop', '');
        backdropEl.classList.add('bg-gray-900', 'bg-opacity-50', 'dark:bg-opacity-80', 'fixed', 'inset-0', 'z-40');
        document.querySelector('body').append(backdropEl);
    } else {
        document.querySelector('[modal-backdrop]').remove();
    }
 } }" x-on:keydown.esc="showModal = false; toggleBackdrop(false)">

    <div x-ref="modal" x-cloak class="overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
            :class="{ hidden: !showModal, flex: showModal }">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded shadow relative dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            x-on:click.prevent="showModal = false; toggleBackdrop(false);">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <svg class="w-14 h-14 text-gray-400 dark:text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-lg font-normal text-gray-500 mb-5 dark:text-gray-400">
                        Are you sure you want to delete this post?
                    </h3>
                    <button type="button" class="lg:mt-2 xl:mt-0 flex-shrink-0 text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded transition ease-in-out duration-150"
                            x-on:click.prevent="showModal = false; toggleBackdrop(false); $refs.form.submit()">
                        Yes, I'm sure
                    </button>
                    <button type="button" class="lg:mt-2 xl:mt-0 flex-shrink-0 border py-2 px-6 focus:outline-none rounded transition ease-in-out duration-150"
                            x-on:click.prevent="showModal = false; toggleBackdrop(false);"
                    >
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}" x-ref="form">
        @csrf
        @method('DELETE')

        <a href="{{ route('posts.edit', [$post->id]) }}"
           class="text-yellow-500 dark:text-yellow-400 inline-flex items-center mt-4">
            {{ __('Edit') }}
        </a> |
        <a href="" class="text-yellow-500 dark:text-yellow-400 inline-flex items-center mt-4"
           x-on:click.prevent="showModal = true; toggleBackdrop(true)">{{ __('Delete') }}</a>
    </form>
</div>
