<section class="space-y-6">
    <header>
        <x-text.h2>Borrar Cuenta</x-text.h2>

        <x-text.p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Una vez eliminada no podrás recuperarla.</x-text.p>
    </header>
    
    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="mt-6">
            <x-inputs.input-label for="password" value="{{ __('Contraseña Actual') }}" />

            <x-inputs.text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                placeholder="{{ __('Ingresa tu contraseña actual para borrar tu cuenta...') }}"
            />

            <x-inputs.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-start">
            <x-inputs.danger-button>
                Eliminar Cuenta
            </x-inputs.danger-button>
        </div>
    </form>
</section>
