<form class="grid grid-cols-1 md:grid-cols-2 gap-4" wire:submit.prevent='edit'>
    <div>
        <x-inputs.input-label for="titulo" :value="__('Titulo')" />
        <x-inputs.text-input id="titulo" 
                      class="block mt-1 w-full" 
                      type="text" 
                      wire:model="titulo" 
                      placeholder="Titulo de la vacante..."
                      :value="old('titulo')" 
                      required autocomplete="titulo" />
        <x-inputs.input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="publicado" :value="__('Visibilidad de la vacante')" />
        <x-inputs.select id="publicado"  
                         class="block mt-1 w-full"
                         wire:model="publicado"
                         required>
            <option value="0" {{$publicado === 0 ? 'selected': '' }}>Oculta</option>
            <option value="1" {{$publicado === 1 ? 'selected': '' }}>Publicada</option>
        </x-inputs.select>
        <x-inputs.input-error :messages="$errors->get('publicado')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="lugar" :value="__('Lugar del cual solicitan el empleo')" />
        <x-inputs.text-input id="lugar" 
                      class="block mt-1 w-full" 
                      type="text" 
                      wire:model="lugar" 
                      placeholder="Ej. Cali, Colombia..."
                      :value="old('lugar')" 
                      required autocomplete="lugar" />
        <x-inputs.input-error :messages="$errors->get('lugar')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="modalidad_id" :value="__('Tipo de modalidad')" />
        <x-inputs.select id="modalidad_id"  
                         class="block mt-1 w-full"
                         wire:model="modalidad_id"
                         required>
            <option value="">Selecciona una modalidad de trabajo...</option>
            @foreach ($modalidades as $modalidad)
                <option value="{{$modalidad->id}}" {{$modalidad->id === old('modalidad_id')? 'selected': '' }} >{{$modalidad->nombre}}</option>
            @endforeach
        </x-inputs.select>
        <x-inputs.input-error :messages="$errors->get('modalidad_id')" class="mt-2" />
    </div>

    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <x-inputs.input-label for="salario" :value="__('Salario')" />
            <x-inputs.text-input id="salario" 
                          class="block mt-1 w-full" 
                          type="number" 
                          wire:model="salario"
                          placeholder="Salario de la vacante..."
                          :value="old('salario')" 
                          required autocomplete="salario" />
            <x-inputs.input-error :messages="$errors->get('salario')" class="mt-2" />
        </div>
    
        <div>
            <x-inputs.input-label for="moneda_id" :value="__('Tipo de moneda')" />
            <x-inputs.select id="moneda_id"  
                             class="block mt-1 w-full"
                             wire:model="moneda_id"
                             required>
                <option value="">Selecciona un tipo de moneda...</option>
                @foreach ($monedas as $moneda)
                    <option value="{{$moneda->id}}" {{$moneda->id === old('moneda_id')? 'selected': '' }} >{{$moneda->prefijo." (".$moneda->nombre.")"}}</option>
                @endforeach
            </x-inputs.select>
            <x-inputs.input-error :messages="$errors->get('moneda_id')" class="mt-2" />
        </div>
    
        <div>
            <x-inputs.input-label for="salario_id" :value="__('Periodo sueldo')" />
            <x-inputs.select id="salario_id"  
                        class="block mt-1 w-full"
                        wire:model="salario_id"
                        required>
                <option value="">Selecciona un periodo para el salario...</option>
                @foreach ($tiposalarios as $periodo)
                    <option value="{{$periodo->id}}" {{$periodo->id === old('salario_id')? 'selected': '' }} >{{$periodo->nombre}}</option>
                @endforeach
            </x-inputs.select>
            <x-inputs.input-error :messages="$errors->get('salario_id')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-inputs.input-label for="empresa" :value="__('Empresa')" />
        <x-inputs.text-input id="empresa" class="block mt-1 w-full" type="text" 
                      wire:model="empresa" placeholder="Empresa que está creando la vacante..."
                      :value="old('empresa')" required autocomplete="empresa" />
        <x-inputs.input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="ultimo_dia" :value="__('Ultimo día para postularse')" />
        <x-inputs.text-input id="ultimo_dia" class="block mt-1 w-full" type="date" 
                      wire:model="ultimo_dia" :value="old('ultimo_dia')"  autocomplete="ultimo_dia" 
                      accept="image/*"/>
        <x-inputs.input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="descripcion" :value="__('Descripción')" />
        <x-inputs.text-area class="block mt-1 w-full" wire:model="descripcion"
                            id="descripcion"  rows="5" placeholder="Descripción del puesto...">
            {{old('descripcion')}}
        </x-inputs.text-area>
        <x-inputs.input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div>
        <x-inputs.input-label for="imagen_nueva" :value="__('Imagen nueva')" />
        <x-inputs.file class="block mt-2 w-full" 
                       wire:model="imagen_nueva"
                       id="imagen_nueva"/>
        <x-activity-indicator wire:loading wire:target="imagen_nueva"/>
        @if ($imagen_nueva)
            @if ($imagen_nueva->extension() === "jpg" || $imagen_nueva->extension() === "jpeg" || $imagen_nueva->extension() === "png" )
                <img class="mt-2 max-w-80" src="{{$imagen_nueva->temporaryUrl()}}" alt="Imagen de vacante">
            @else
                <x-inputs.input-error :messages="['El archivo debe ser jpg, jpeg o png.']" class="mt-2" />
            @endif
        @endif
        @if ($imagen)
            <div class="mt-2">
                <x-inputs.input-label :value="__('Imagen Actual')" />
                <img class="mt-2 max-w-80" src="{{asset('storage/vacantes/'.$imagen)}}" alt="Imagen actual de la vacante {{$titulo}}">
            </div>
        @endif
        
        <x-inputs.input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
    </div>

    <div class="flex items-center md:col-span-2 ">
        <x-inputs.primary-button wire:loading.attr='disabled' wire:target="edit">
            <p wire:loading.remove wire:target="edit">Editar</p>
            <x-activity-indicator class="text-white dark:text-gray-900 w-3 h-3" wire:loading wire:target="edit"/>
        </x-inputs.primary-button>
    </div>
</form>