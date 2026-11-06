<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
        <p class="text-sm text-gray-600 mt-1">Sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-3 mt-6 pt-4 border-t border-gray-100">
            @if (Route::has('password.request'))
                <a class="underline underline-offset-4 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center sm:text-left"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <a href="{{ route('login') }}"
               onclick="event.preventDefault(); this.closest('form').submit();"
               class="inline-block w-full sm:w-auto text-center px-5 py-1.5 border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] rounded-sm text-sm leading-normal transition cursor-pointer">
                {{ __('Log in') }}
            </a>
        </div>
    </form>

    <div class="text-center mt-6 text-sm text-gray-600">
        Don't have an account?
        <a href="{{ route('register') }}" class="underline underline-offset-4 text-indigo-600 hover:text-indigo-800">Register</a>
    </div>
</x-guest-layout>
