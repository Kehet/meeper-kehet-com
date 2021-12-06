<header class="text-gray-600 dark:text-gray-400 dark:bg-gray-900 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('home') }}"
           class="flex title-font font-medium items-center text-gray-900 dark:text-white mb-4 md:mb-0">
            <x-application-logo/>
            <span class="ml-3 text-xl">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            {{--
            <x-nav-link href="" onclick="localStorage.theme = 'light'; updateTheme()">light</x-nav-link>
            <x-nav-link href="" onclick="localStorage.theme = 'dark'; updateTheme()">dark</x-nav-link>
            <x-nav-link href="" onclick="localStorage.removeItem('theme'); updateTheme()">os</x-nav-link>
            --}}

            @auth
                <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">New Post</x-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link href="" onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            @endauth

            @guest
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">Login</x-nav-link>
            @endguest

        </nav>
        {{--
        <button class="inline-flex items-center bg-gray-100 dark:bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 rounded text-base mt-4 md:mt-0">
            Button
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </button>
        --}}
    </div>
</header>
