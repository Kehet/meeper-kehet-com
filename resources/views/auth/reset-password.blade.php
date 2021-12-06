<x-app-layout>
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/3 md:w-2/3 mx-auto">
            <x-header>
                Reset Password
            </x-header>

            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('password.update') }}">
            @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <x-label for="email" :value="__('Email')"/>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                             :value="old('email', $request->email)" required autofocus/>
                </div>

                <div class="mt-4">
                    <x-label for="password" :value="__('Password')"/>

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
