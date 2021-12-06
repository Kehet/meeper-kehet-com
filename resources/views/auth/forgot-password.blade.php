<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/3 md:w-2/3 mx-auto">
            <x-header>
                Forgot your password?
                <x-slot name="description">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </x-slot>
            </x-header>

            <x-auth-session-status class="mb-4" :status="session('status')"/>
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('password.email') }}">
            @csrf

                <div>
                    <x-label for="email" :value="__('Email')"/>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
