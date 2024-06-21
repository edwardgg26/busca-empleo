<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-inputs.input-label for="email" :value="__('Email')" />
            <x-inputs.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-inputs.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-inputs.input-label for="password" :value="__('Contraseña')" />

            <x-inputs.text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-inputs.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <x-inputs.input-label for="remember_me" class="inline-flex items-center"> 
                <x-inputs.checkbox id="remember_me" for="remember_me" type="checkbox" name="remember" />
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Mantener mi sesion abierta') }}</span>
            </x-inputs.input-label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-inputs.primary-button class="w-full">
                {{ 'Ingresar' }}
            </x-inputs.primary-button>
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-links.primary-link :href="route('register')">
                Crear Cuenta
            </x-links.primary-link>

            <x-links.primary-link :href="route('password.request')">
                Olvidaste tu contraseña?
            </x-links.primary-link>
        </div>
    </form>
</x-guest-layout>
