<div>
    <x-text.h2>Postularme a la vacante</x-text.h2>
    @if (session()->has('mensaje'))
        <x-alerts.success> 
            Tu hoja de vida se envió con exito.
        </x-alerts.success>
    @else
        <form class="grid grid-cols-1 md:grid-cols-2 gap-4" wire:submit.prevent='postular'>
            <div>
                <x-inputs.input-label for="hv" :value="__('Hoja de Vida (PDF)')" />
                <x-inputs.file class="block mt-2 w-full" wire:model="hv"
                            id="hv" accept=".pdf"/>
                <x-activity-indicator wire:loading wire:target="hv"/>
                @if ($hv)
                    @if ($hv->extension() === "pdf")
                        <x-inputs.input-success :messages="['El archivo esta listo para enviar.']" class="mt-2" />
                    @else
                        <x-inputs.input-error :messages="['El archivo debe ser pdf.']" class="mt-2" />
                    @endif
                @endif
                <x-inputs.input-error :messages="$errors->get('hv')" class="mt-2" />
            </div>
        
            <div class="flex items-center md:col-span-2 ">
                <x-inputs.primary-button wire:loading.attr='disabled' wire:target="postular">
                    <x-text.p wire:loading.remove wire:target="postular">Postularme a la vacante</x-text.h2>
                    <x-activity-indicator class="text-white w-3 h-3" wire:loading wire:target="postular"/>
                </x-inputs.primary-button>
            </div>
        </form>
    @endif
</div>
