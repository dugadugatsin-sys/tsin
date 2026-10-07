<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white tracking-tight">Create an Account</h2>
        <p class="text-sm text-gray-400 mt-1">Get started with your free account today.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="text-gray-300 font-medium text-xs uppercase tracking-wider mb-2" />
            <x-text-input id="name" 
                          class="block w-full px-4 py-3 bg-gray-950 border border-gray-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 rounded-xl text-white placeholder-gray-500 text-sm transition-all shadow-sm" 
                          type="text" 
                          name="name" 
                          :value="old('name')" 
                          placeholder="Tsin Dugaduga"
                          required 
                          autofocus 
                          autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-400" />
        </div>

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
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-300 font-medium text-xs uppercase tracking-wider mb-2" />

            <x-text-input id="password" 
                          class="block w-full px-4 py-3 bg-gray-950 border border-gray-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 rounded-xl text-white placeholder-gray-500 text-sm transition-all shadow-sm"
                          type="password"
                          name="password"
                          placeholder=""
                          required 
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300 font-medium text-xs uppercase tracking-wider mb-2" />

            <x-text-input id="password_confirmation" 
                          class="block w-full px-4 py-3 bg-gray-950 border border-gray-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 rounded-xl text-white placeholder-gray-500 text-sm transition-all shadow-sm"
                          type="password"
                          name="password_confirmation" 
                          placeholder=""
                          required 
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold text-sm transition-all shadow-lg shadow-blue-600/25 focus:ring-2 focus:ring-blue-500 focus:ring-offset-black border-0">
                {{ __('Register Account') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-2">
            <p class="text-xs text-gray-400">
                Already registered? 
                <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors">Sign in here</a>
            </p>
        </div>
    </form>
</x-guest-layout>