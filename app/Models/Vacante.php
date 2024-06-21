<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = ['ultimo_dia' => 'date'];

    protected $fillable = [
        'titulo',
        'lugar',
        'modalidad_id',
        'salario',
        'moneda_id',
        'salario_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function moneda(){
        return $this->belongsTo(Moneda::class);
    }

    public function tipoSalario(){
        return $this->belongsTo(Salario::class,'salario_id');
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::class,'modalidad_id');
    }

    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    public function reclutador(){
        return $this->belongsTo(User::class,'user_id');
    }
}
