<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;

    public function mount(){
        if($this->vacante->publicado === 0 && (!auth()->check() || auth()->user()->id !== $this->vacante->user_id)){
            return redirect()->route('home');
        }
    }
    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}
