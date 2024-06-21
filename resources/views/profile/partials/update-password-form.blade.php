<section>
    <header>
        <x-text.h2>Cambiar Contraseña</x-text.h2>

        <x-text.p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Asegurate de que tu cuenta tenga una contraseña larga con mayusculas, minusculas y números para mayor seguridad.</x-text.p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-inputs.input-label for="update_password_current_password" :value="__('Contraseña Actual')" />
            <x-inputs.text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-inputs.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-inputs.input-label for="update_password_password" :value="__('Contraseña Nueva')" />
            <x-inputs.text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-inputs.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-inputs.input-label for="update_password_password_confirmation" :value="__('Repetir Contraseña Nueva')" />
            <x-inputs.text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-inputs.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-inputs.primary-button>Guardar</x-primary-button>

            @if (session('status') === 'password-updated')
                <x-alerts.success x-data="{ show: true }"
                        x-show="show"
                        x-transition> 
                    Se ha actualizado la contraseña con exito.
                </x-alerts.success>
            @endif
        </div>
    </form>
</section>
