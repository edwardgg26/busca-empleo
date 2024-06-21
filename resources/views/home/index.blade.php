<x-app-layout>
    <x-slot name="header">
        <x-text.h2>Inicio</x-text.h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:home-vacantes />
            </div>
        </div>
    </div>
</x-app-layout>