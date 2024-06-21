<?php

namespace App\Livewire;

use App\Models\Modalidad;
use App\Models\Moneda;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $lugar;
    public $modalidad_id;
    public $salario;
    public $moneda_id;
    public $salario_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required|string',
        'lugar' => 'required|string',
        'modalidad_id'=> 'required',
        'salario' => 'required|numeric',
        'moneda_id'=> 'required',
        'salario_id' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'nullable|date',
        'descripcion' => 'required|string',
        'imagen'=>'nullable|image|mimes:png,jpg,jpeg'
    ];

    use WithFileUploads;

    public function render(){
        $monedas = Moneda::all();
        $tiposalarios = Salario::all();
        $modalidades = Modalidad::all();
    
        return view('livewire.crear-vacante',[
            'monedas'=>$monedas,
            'tiposalarios' => $tiposalarios,
            'modalidades' => $modalidades
        ]);
    }

    public function save(){
        $datos = $this->validate();
        $imagen = $this->imagen->store('public/vacantes');
        $nombreImagen = str_replace('public/vacantes/','',$imagen);

        Vacante::create([
            'titulo' => $datos['titulo'],
            'lugar' => $datos['lugar'],
            'modalidad_id' => $datos['modalidad_id'],
            'salario' => $datos['salario'],
            'moneda_id'=> $datos['moneda_id'],
            'salario_id' => $datos['salario_id'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen'=>$nombreImagen,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('mensaje','La vacante se publicó con exito.');

        redirect()->route('vacantes.index');
    }
}
