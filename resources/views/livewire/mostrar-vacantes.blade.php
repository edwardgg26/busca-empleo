<div>
    <div class="space-y-4">
        @forelse ($vacantes as $vacante)
            <div class="flex flex-col md:flex-row md:justify-between md:items-center border-b pb-4 last:pb-0 last:border-b-0">
                <div class="mb-2 md:mb-0">
                    <x-links.base-link href="{{route('vacantes.show',$vacante)}}">{{$vacante->titulo}} {{ $vacante->publicado === 0 ? '(Oculta)' : null}}</x-links.base-link>
                    <x-text.p class="text-gray-500">{{$vacante->empresa}}</x-text.p>
                    <x-text.p><span class="font-black">Localidad:</span> {{$vacante->lugar}}</x-text.p>
                    @if ($vacante->ultimo_dia)
                        <x-text.p><span class="font-black">Ultimo día para postularse:</span> {{$vacante->ultimo_dia->format('d/m/Y')}}</x-text.p>
                    @endif
                </div>
    
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-1">
                    <x-links.primary-button href="{{route('candidatos.index',$vacante)}}">
                        Candidatos ({{$vacante->candidatos->count()}})
                    </x-links.primary-button>
    
                    <x-links.secondary-button href="{{route('vacantes.edit',$vacante)}}">
                        Editar
                    </x-links.secondary-button>
    
                    <x-inputs.danger-button wire:click="$dispatch('mostrarAlerta',{id: {{$vacante->id}}})">
                        Eliminar
                    </x-inputs.danger-button>
                </div>
            </div>
        @empty
            <div>
                <x-text.p class="text-center">No hay vacantes. Empieza creando una.</x-text.p>
            </div>
        @endforelse
    </div>
    <div>
        {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('mostrarAlerta',id => {
        Swal.fire({
            title: '¿Eliminar Vacante?',
            text: "No podras recuperarla una vez haya sido eliminada!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#C21A11',
            cancelButtonColor: '#0d9488',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete',id);
                Swal.fire({
                    title: 'Vacante eliminada!',
                    text: 'Se ha eliminado la vacante con exito.',
                    icon: 'success',
                    confirmButtonColor: '#0d9488'
                })
            }
        })
    })
</script>
@endpush
