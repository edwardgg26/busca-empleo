<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        <x-text.p>Olvidaste tu contraseña? No hay problema. Ingresa tu email y te enviaremos las instrucciones para cambiarla.</x-text.p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-inputs.input-label for="email" :value="__('Email')" />
            <x-inputs.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-inputs.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-inputs.primary-button class="w-full">
                {{ 'Enviar email de reinicio' }}
            </x-inputs.primary-button>
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-links.primary-link :href="route('login')">
                Ya tienes una cuenta?
            </x-links.primary-link>
            <x-links.primary-link :href="route('register')">
                Crear Cuenta
            </x-links.primary-link>
        </div>
    </form>
</x-guest-layout>
