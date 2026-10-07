<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-emerald-400 font-medium text-sm" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white tracking-tight">Welcome Back</h2>
        <p class="text-sm text-gray-400 mt-1">Please enter your details to sign in to your account.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-300 font-medium text-xs uppercase tracking-wider mb-2" />
            <x-text-input id="email" 
                          class="block w-full px-4 py-3 bg-gray-950 border border-gray-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 rounded-xl text-white placeholder-gray-500 text-sm transition-all shadow-sm" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          placeholder="tsin@company.com"
                          required 
                          autofocus 
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <x-input-label for="password" :value="__('Password')" class="text-gray-300 font-medium text-xs uppercase tracking-wider" />
                @if (Route::has('password.request'))
                    <a class="text-xs text-blue-400 hover:text-blue-300 font-medium transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" 
                          class="block w-full px-4 py-3 bg-gray-950 border border-gray-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 rounded-xl text-white placeholder-gray-500 text-sm transition-all shadow-sm"
                          type="password"
                          name="password"
                          placeholder=""
                          required 
                          autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-950 border-gray-800 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-black" name="remember">
                <span class="ms-2 text-sm text-gray-400 hover:text-gray-300 transition-colors">{{ __('Remember me on this device') }}</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div>
            <x-primary-button class="w-full justify-center py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold text-sm transition-all shadow-lg shadow-blue-600/25 focus:ring-2 focus:ring-blue-500 focus:ring-offset-black border-0">
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-2">
                <p class="text-xs text-gray-400">
                    Don't have an account yet? 
                    <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors">Create an account</a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>