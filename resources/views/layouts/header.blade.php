<header
    id="page-header"
    class="z-1 flex flex-none items-center bg-gray-800 shadow-xs"
>
    <div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">
        <div class="flex justify-between py-4">
            <!-- Left Section -->
            <div class="flex items-center gap-2 lg:gap-6">
                <!-- Logo -->
                <a
                    href="{{ route('home') }}"
                    class="group inline-flex items-center gap-2 text-lg font-bold tracking-wide text-gray-100 hover:text-gray-300"
                >
                    <svg
                        class="hi-mini hi-cube-transparent inline-block size-5 text-brand-400 transition group-hover:scale-110"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M9.638 1.093a.75.75 0 01.724 0l2 1.104a.75.75 0 11-.724 1.313L10 2.607l-1.638.903a.75.75 0 11-.724-1.313l2-1.104zM5.403 4.287a.75.75 0 01-.295 1.019l-.805.444.805.444a.75.75 0 01-.724 1.314L3.5 7.02v.73a.75.75 0 01-1.5 0v-2a.75.75 0 01.388-.657l1.996-1.1a.75.75 0 011.019.294zm9.194 0a.75.75 0 011.02-.295l1.995 1.101A.75.75 0 0118 5.75v2a.75.75 0 01-1.5 0v-.73l-.884.488a.75.75 0 11-.724-1.314l.806-.444-.806-.444a.75.75 0 01-.295-1.02zM7.343 8.284a.75.75 0 011.02-.294L10 8.893l1.638-.903a.75.75 0 11.724 1.313l-1.612.89v1.557a.75.75 0 01-1.5 0v-1.557l-1.612-.89a.75.75 0 01-.295-1.019zM2.75 11.5a.75.75 0 01.75.75v1.557l1.608.887a.75.75 0 01-.724 1.314l-1.996-1.101A.75.75 0 012 14.25v-2a.75.75 0 01.75-.75zm14.5 0a.75.75 0 01.75.75v2a.75.75 0 01-.388.657l-1.996 1.1a.75.75 0 11-.724-1.313l1.608-.887V12.25a.75.75 0 01.75-.75zm-7.25 4a.75.75 0 01.75.75v.73l.888-.49a.75.75 0 01.724 1.313l-2 1.104a.75.75 0 01-.724 0l-2-1.104a.75.75 0 11.724-1.313l.888.49v-.73a.75.75 0 01.75-.75z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </a>
                <!-- END Logo -->

                <!-- Desktop Navigation -->
                <nav class="hidden items-center gap-2 lg:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Posts</x-nav-link>
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">Categories</x-nav-link>
                </nav>
                <!-- END Desktop Navigation -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="flex items-center gap-2">

                <x-search class="mx-3" />

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-nav-link href="" onclick="event.preventDefault();this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                @endauth

                @guest
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">{{ __('Login') }}</x-nav-link>
                @endguest

                <!-- Toggle Mobile Navigation -->
                <div class="lg:hidden">
                    <button
                        x-on:click="mobileNavOpen = !mobileNavOpen"
                        type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-700 bg-gray-800 px-3 py-2 text-sm leading-5 font-semibold text-gray-300 hover:border-gray-600 hover:text-gray-200 hover:shadow-xs focus:ring-3 focus:ring-gray-600/40 active:border-gray-700 active:shadow-none"
                    >
                        <svg
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                            class="hi-solid hi-menu inline-block size-5"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </div>
                <!-- END Toggle Mobile Navigation -->
            </div>
            <!-- END Right Section -->
        </div>

        <!-- Mobile Navigation -->
        <div x-cloak x-show="mobileNavOpen" class="lg:hidden">
            <nav class="flex flex-col gap-2 border-t border-gray-700 py-4">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">Posts</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">Categories</x-responsive-nav-link>
            </nav>
        </div>
        <!-- END Mobile Navigation -->
    </div>
</header>
