<form class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-4" wire:submit='leerFormulario'>
    <div>
        <x-inputs.input-label for="termino" :value="__('Termino de busqueda')" />
        <x-inputs.text-input id="termino" 
                      class="block mt-1 w-full" 
                      type="text" 
                      wire:model="termino" 
                      placeholder="Ej. Desarrollador en Laravel..."
                      :value="old('termino')" 
                      autocomplete="termino" />
        <x-inputs.input-error :messages="$errors->get('termino')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="lugar" :value="__('Ciudad o pais')" />
        <x-inputs.text-input id="lugar" 
                      class="block mt-1 w-full" 
                      type="text" 
                      wire:model="lugar" 
                      placeholder="Localidad en la que buscas la vacante..."
                      :value="old('lugar')" 
                      autocomplete="lugar" />
        <x-inputs.input-error :messages="$errors->get('lugar')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="modalidad_id" :value="__('Modalidad de trabajo')" />
        <x-inputs.select id="modalidad_id"  
                    class="block mt-1 w-full"
                    wire:model="modalidad_id">
            <option value="">Selecciona una modalidad para la vacante...</option>
            @foreach ($modalidades as $modalidad)
                <option value="{{$modalidad->id}}" {{$modalidad->id === old('modalidad_id')? 'selected': '' }} >{{$modalidad->nombre}}</option>
            @endforeach
        </x-inputs.select>
        <x-inputs.input-error :messages="$errors->get('modalidad_id')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="salario_min" :value="__('Salario Minimo')" />
        <x-inputs.text-input id="salario_min" 
                      class="block mt-1 w-full" 
                      type="number" 
                      wire:model="salario_min"
                      placeholder="Salario minimo de la vacante..."
                      :value="old('salario_min')" 
                      autocomplete="salario_min" />
        <x-inputs.input-error :messages="$errors->get('salario_min')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="empresa" :value="__('Empresa')" />
        <x-inputs.text-input id="empresa" class="block mt-1 w-full" type="text" 
                      wire:model="empresa" placeholder="Empresa en la que buscas el empleo..."
                      :value="old('empresa')" autocomplete="empresa" />
        <x-inputs.input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <div class="flex items-center md:col-span-3">
        <x-inputs.primary-button wire:loading.attr='disabled' wire:target="leerFormulario">
            <p wire:loading.remove wire:target="leerFormulario">Filtrar</p>
            <x-activity-indicator class="text-white dark:text-gray-900 w-3 h-3" wire:loading wire:target="leerFormulario"/>
        </x-inputs.primary-button>
    </div>
</form>