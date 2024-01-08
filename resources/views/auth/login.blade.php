<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="py-12 px-6 md:py-24 md:px-12">
        @csrf

        <!-- Email Address -->
        <div class="flex items-center text-lg mb-6 md:mb-8">
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
            <svg class="absolute ml-3 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" width="24">
                <path stroke-linecap="round"
                    d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
            </svg>

            <x-text-input id="email" class="block mt-1 w-full border" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 flex items-center text-lg mb-6 md:mb-8">
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}
            <svg class="absolute ml-3 font-bold" viewBox="0 0 24 24" width="24">
                <path
                    d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z" />
            </svg>
            <x-text-input id="password" class="block mt-1 w-full border" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->


        <div class="flex items-center my-4 mt-8">



                <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                    Login
                </button>

        </div>
    </form>

</x-guest-layout>
