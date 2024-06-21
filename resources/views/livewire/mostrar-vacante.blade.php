<div class="space-y-5">
    <div>
        <div class="flex justify-between items-center mb-3">
            <x-text.p class="font-black text-lg">{{$vacante->titulo}} {{ $vacante->publicado === 0 ? '(Oculta)' : null}}</x-text.p>
            <x-text.p class="text-gray-500">{{$vacante->created_at->diffForHumans()}}</x-text.p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
            <x-text.p><span class="font-black">Empresa:</span> {{$vacante->empresa}}</x-text.p>
            <x-text.p><span class="font-black">Localidad:</span> {{$vacante->lugar}}</x-text.p>
            <x-text.p><span class="font-black">Modalidad de trabajo:</span> {{$vacante->modalidad->nombre}}</x-text.p>
            <x-text.p><span class="font-black">Salario:</span> $@money($vacante->salario) {{$vacante->moneda->prefijo." (".$vacante->moneda->nombre.")"}}</x-text.p>
            <x-text.p><span class="font-black">Periodo del Salario:</span> {{$vacante->tipoSalario->nombre}}</x-text.p>
            <x-text.p><span class="font-black">Ultimo día para postularse:</span> {{$vacante->ultimo_dia->format('d/m/Y')}}</x-text.p>
        </div>
    </div>
    
    <div class="flex flex-col md:flex-row gap-3">
        @if ($vacante->imagen)
            <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" class="w-full max-w-xl" alt="Imagen de la vacante {{$vacante->titulo}}">
        @endif
        <div>
            <x-text.h2>Descripción</x-text.h2>
            <x-text.p>{{$vacante->descripcion}}</x-text.p>
        </div>
    </div>

    @guest    
        <div>
            <x-text.p>
                ¿Deseas postularte a esta vacante? <x-links.primary-link href="{{route('register')}}">Crea una cuenta</x-links.primary-link> o <x-links.primary-link href="{{route('login')}}">inicia sesion</x-links.primary-link>
            </x-text.p>
        </div>
    @endguest

    @auth    
        @cannot('create',App\Models\Vacante::class)
            <livewire:postular-vacante :$vacante/>
        @endcannot
    @endauth
</div>
