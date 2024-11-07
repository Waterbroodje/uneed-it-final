<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    Welkom terug
                </h2>
                <p class="text-sm text-gray-600 mt-2">
                    Log in om je afspraken te beheren
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" 
                                 class="block mt-1 w-full" 
                                 type="email" 
                                 name="email" 
                                 :value="old('email')" 
                                 required 
                                 autofocus 
                                 autocomplete="username" 
                                 placeholder="voer je email in" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" 
                                 class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required 
                                 autocomplete="current-password"
                                 placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 underline" 
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-blue-600 hover:bg-blue-700">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Registration Link -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-600">
                    Nog geen account? 
                    <a href="/register" 
                       class="font-medium text-blue-600 hover:text-blue-500">
                        Registreer hier
                    </a>
                </p>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>Voor vragen of hulp bij het inloggen,</p>
            <p>neem contact op met de beheerder</p>
        </div>
    </div>
</x-guest-layout>