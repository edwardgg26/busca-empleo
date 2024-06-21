<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\HomeVacantes;
use App\Models\Modalidad;

class FiltrarVacantes extends Component
{
    public $termino;
    public $lugar;
    public $modalidad_id;
    public $salario_min;
    public $empresa;
    public $datos;

    protected $rules = [
        'termino' => 'nullable|string',
        'lugar' => 'nullable|string',
        'modalidad_id' => 'nullable|numeric',
        'salario_min' => 'nullable|numeric',
        'empresa' => 'nullable|string'
    ];

    public function leerFormulario(){
        $datos = $this->validate();
        $this->datos = $datos;
        $this->dispatch('recibirDatos', datos: $datos);
    }

    public function render()
    {
        $modalidades = Modalidad::all();

        return view('livewire.filtrar-vacantes',[
            'modalidades' => $modalidades
        ]);
    }
}
