<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $hv;
    public $vacante;
    protected $rules = [
        'hv' => 'required|mimes:pdf'
    ] ;

    use WithFileUploads;

    public function mount(Vacante $vacante) {
        $this->vacante = $vacante;
    }

    public function postular(){
        $datos = $this->validate();

        $hv = $this->hv->store('public/hv');
        $datos['hv'] = str_replace('public/hv/','',$hv);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'hv' => $datos['hv']
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, $this->vacante->user_id));

        session()->flash('mensaje','Se envio tu hoja de vida correctamente.');
        redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
