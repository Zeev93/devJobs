<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id'
    ];

    // Relacion 1:1 Categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    // Relacion 1:1 Salario
    public function salario(){
        return $this->belongsTo(Salario::class);
    }
    // Relacion 1:1 Ubicacion
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
    // Relacion 1:1 Experiencia
    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }
    // Relacion 1:1 Reclutador
    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacion 1:n vacante y canddidatos
    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }


}
