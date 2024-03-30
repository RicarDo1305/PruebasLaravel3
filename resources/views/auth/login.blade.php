<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="-mt-5">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Numero de control -->
       <div class="mt-4">
            <x-input-label for="noControl" :value="__('Numero control')" />

            <x-text-input id="noControl" class="block mt-1 w-full p-1" 
                          type="text" 
                          name="noControl" 
                          :value="old('noControl')" 
                          required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('noControl')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full py-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-indigo-600 shadow-sm  focus:ring-indigo-600 focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2  focus:ring-indigo-500 focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <a class="ml-5 underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2  focus:ring-indigo-500 focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __('Registrarse') }}
                </a>

        <x-primary-button class="ms-3 bg-green-900 text-white hover:bg-green-700">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-guest-layout>
