<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{
    protected $listeners = ['delete'];
    public function delete($id){
        $vacante = Vacante::find($id);
        $this->authorize('delete',$vacante);

        if($vacante->imagen){
            Storage::delete('public/vacantes/'.$vacante->imagen);
        }
        
        $vacante->delete();
    }
    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
