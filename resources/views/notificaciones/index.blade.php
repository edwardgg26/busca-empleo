<x-app-layout>
    <x-slot name="header">
        <x-text.h2>Mis Notificaciones</x-text.h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-4">
                @forelse ($notificaciones as $notificacion)
                    <div class="border-b pb-4 last:pb-0 last:border-0">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-3">
                            <div class="flex gap-2 items-center">
                                <x-text.p>Tienes un nuevo candidato en: <span class="font-black">{{$notificacion->data['nombre_vacante']}}</span></x-text.p>
                                @if (!$notificacion->read_at)
                                    <div class="rounded-full items-center justify-center w-3 h-3 bg-danger"></div>
                                @endif
                            </div>
                            <x-text.p class="text-gray-500">{{$notificacion->created_at->diffForHumans()}}</x-text.p>
                        </div>

                        <x-links.primary-button target="_blank" href="{{route('candidatos.index',$notificacion->data['id_vacante'])}}">Ver Candidatos</x-links.primary-button>
                    </div>
                @empty
                    <x-text.p>No hay notificaciones</x-text.p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>