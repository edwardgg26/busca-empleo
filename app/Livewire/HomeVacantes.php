<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On; 

class HomeVacantes extends Component
{
    public $termino;
    public $salario_min;
    public $modalidad_id;
    public $empresa;
    public $publicado = 1;

    public function render()
    {
        // $vacantes = Vacante::when($this->termino, function($query){
        //     $query->where('titulo', 'LIKE' ,"%".$this->termino."%")->orWhere('descripcion', 'LIKE' ,"%".$this->termino."%");
        // })->when($this->salario_min, function($query){
        //     $query->where('salario', '>=' ,$this->salario_min);
        // })->when($this->modalidad_id, function($query){
        //     $query->where('modalidad_id',$this->modalidad_id);
        // })->when($this->empresa, function($query){
        //     $query->where('empresa', 'LIKE' ,"%".$this->empresa."%");
        // })->where('publicado','=',$this->publicado)->orderBy('created_at','DESC')->paginate(10);

        $vacantes = Vacante::where('publicado','=',$this->publicado)->when($this->termino, function($query){
            $query->where('titulo', 'LIKE' ,"%".$this->termino."%")->orWhere('descripcion', 'LIKE' ,"%".$this->termino."%");
        })->when($this->salario_min, function($query){
            $query->where('salario', '>=' ,$this->salario_min);
        })->when($this->modalidad_id, function($query){
            $query->where('modalidad_id',$this->modalidad_id);
        })->when($this->empresa, function($query){
            $query->where('empresa', 'LIKE' ,"%".$this->empresa."%");
        })->where('publicado','=',$this->publicado)->orderBy('created_at','DESC')->paginate(10);

        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }

    #[On('recibirDatos')] 
    public function actualizarVacantes($datos)
    {
        $this->termino = $datos['termino'];
        $this->salario_min = $datos['salario_min'];
        $this->modalidad_id = $datos['modalidad_id'];
        $this->empresa = $datos['empresa'];
    }
}
