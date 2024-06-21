<?php

namespace App\Livewire;

use App\Models\Moneda;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Modalidad;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditarVacante extends Component
{
    public $id;
    public $titulo;
    public $lugar;
    public $publicado;
    public $modalidad_id;
    public $salario;
    public $moneda_id;
    public $salario_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    public function mount(Vacante $vacante){
        $this->id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->lugar = $vacante->lugar;
        $this->modalidad_id = $vacante->modalidad_id;
        $this->salario = $vacante->salario;
        $this->publicado = $vacante->publicado;
        $this->moneda_id = $vacante->moneda_id;
        $this->salario_id = $vacante->salario_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    protected $rules = [
        'titulo' => 'required|string',
        'lugar' => 'required|string',
        'modalidad_id'=> 'required',
        'salario' => 'required|numeric',
        'moneda_id'=> 'required',
        'publicado'=> 'required|numeric|min:0|max:1',
        'salario_id' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'nullable|date',
        'descripcion' => 'required|string',
        'imagen_nueva'=>'nullable|image|mimes:png,jpg,jpeg'
    ];

    public function edit(){
        $datos = $this->validate();

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
            Storage::delete('public/vacantes/'.$this->imagen);
        }

        $vacante = Vacante::find($this->id);

        $vacante->titulo = $datos['titulo'];
        $vacante->lugar = $datos['lugar'];
        $vacante->modalidad_id = $datos['modalidad_id'];
        $vacante->salario = $datos['salario'];
        $vacante->moneda_id = $datos['moneda_id'];
        $vacante->publicado = $datos['publicado'];
        $vacante->salario_id = $datos['salario_id'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        $vacante->user_id = auth()->user()->id;

        $vacante->save();

        session()->flash('mensaje','La vacante se actualizó con exito.');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $monedas = Moneda::all();
        $tiposalarios = Salario::all();
        $modalidades = Modalidad::all();
        return view('livewire.editar-vacante',[
            'monedas'=>$monedas,
            'tiposalarios' => $tiposalarios,
            'modalidades' => $modalidades
        ]);
    }
}
