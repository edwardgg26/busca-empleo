<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Gracias por registrarte! Antes de comenzar, debe verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar por correo electrónico. Si no recibió el correo electrónico, con gusto le enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <x-alerts.success>Hemos enviado un nuevo enlace de verificación a tu correo.</x-alerts.success>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-inputs.primary-button>
                    {{ __('Reenviar Correo de verificación') }}
                </x-inputs.primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-teal-600 dark:text-gray-400 hover:text-teal-700 dark:hover:text-gray-100 rounded-md">
                {{ __('Salir') }}
            </button>
        </form>
    </div>
</x-guest-layout>
