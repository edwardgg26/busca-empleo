<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-inputs.input-label for="name" :value="__('Nombre')" />
            <x-inputs.text-input :value="{{old('name')}}" xmlns="http://www.w3.org/2000/svg" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-inputs.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-inputs.input-label for="email" :value="__('Email')" />
            <x-inputs.text-input :value="{{old('email')}}" :errors="$errors->get('email')" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-inputs.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <x-inputs.input-label for="rol" :value="__('Rol')" />
            <x-inputs.select id="rol"  
                             class="block mt-1 w-full"
                             name="rol_id"
                             required>
                <option value="">Selecciona un rol...</option>
                @foreach ($roles as $rol)
                    <option value="{{$rol->id}}" {{$rol->id === old('rol_id')? 'selected': '' }} >{{$rol->nombre}}</option>
                @endforeach
            </x-inputs.select>
            <x-inputs.input-error :messages="$errors->get('rol_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-inputs.input-label for="password" :value="__('Contraseña')" />

            <x-inputs.text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-inputs.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-inputs.input-label for="password_confirmation" :value="__('Repetir Contraseña')" />

            <x-inputs.text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-inputs.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-links.primary-link :href="route('login')">
                Ya tienes una cuenta?
            </x-links.primary-link>

            <x-inputs.primary-button>
                {{ __('Crear Cuenta') }}
            </x-inputs.primary-button>
        </div>
    </form>
</x-guest-layout>
