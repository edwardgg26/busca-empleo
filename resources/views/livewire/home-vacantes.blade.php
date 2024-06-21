<div>

    <x-inputs.secondary-button wire:click="$dispatch('mostrarFiltros')">Filtros</x-inputs.secondary-button>

    <div id="contenedorFiltros" class="hidden mt-4">            
        <x-text.h2>Filtrar Vacantes</x-text.h2>
        <livewire:filtrar-vacantes />
    </div>

    <div class="my-4 space-y-4">

        <x-text.h2>Vacantes disponibles</x-text.h2>

        @forelse ($vacantes as $vacante)
            <div class="border-b pb-4 last:pb-0 last:border-b-0">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <x-links.base-link href="{{route('vacantes.show',$vacante)}}">{{$vacante->titulo}}</x-links.base-link>
                    <x-text.p class="text-gray-500">{{$vacante->created_at->diffForHumans()}}</x-text.p>
                </div>
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-2 md:mb-0">
                        <x-text.p>{{$vacante->empresa}}</x-text.p>
                        <x-text.p><span class="font-black">Localidad:</span> {{$vacante->lugar}}</x-text.p>
                        <div>
                            <x-text.p><span class="font-black">Salario:</span> $@money($vacante->salario) {{$vacante->moneda->prefijo}}</x-text.p>
                            <x-text.p><span class="font-black">Modalidad:</span> {{$vacante->modalidad->nombre}}</x-text.p>
                        </div>
                        @if ($vacante->ultimo_dia)
                            <x-text.p><span class="font-black">Ultimo día para postularse:</span> {{$vacante->ultimo_dia->format('d/m/Y')}}</x-text.p>
                        @endif
                    </div>
        
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-1">
                        <x-links.primary-button target="_blank" href="{{route('vacantes.show',$vacante)}}">
                            Ver Vacante
                        </x-links.primary-button>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <x-text.p>No hay vacantes disponibles para tu busqueda</x-text.p>
            </div>
        @endforelse
    </div>

    <div>
        {{ $vacantes->links() }}
    </div>
</div>

@script
<script>
$wire.on('mostrarFiltros',() => {
    const contenedorFiltros = document.querySelector('#contenedorFiltros');
    contenedorFiltros.classList.toggle('hidden');
})
</script>
@endscript