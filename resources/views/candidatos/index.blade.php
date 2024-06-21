<x-app-layout>
    <x-slot name="header">
        <x-text.h2>{{ 'Candidatos: '.$vacante->titulo }}</x-text.h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-4">
                @forelse ($vacante->candidatos as $candidato)
                    <div class="border-b pb-4 last:pb-0 last:border-0">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                            <div class="mb-3 md:mb-0">
                                <x-text.p class="font-black">{{$candidato->user->name}}</x-text.p>
                                <x-text.p class="text-gray-500">Se postuló {{$candidato->created_at->diffForHumans()}}</x-text.p>
                                <x-text.p>{{$candidato->user->email}}</x-text.p>
                            </div>
                            <x-links.primary-button class="w-auto" href="{{asset('storage/hv/'.$candidato->hv)}}" rel="noreferer noopener" target="_blank">Ver Hoja de Vida</x-links.primary-button>
                        </div>
                    </div>
                @empty
                    <x-text.p>No hay candidatos aún</x-text.p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>