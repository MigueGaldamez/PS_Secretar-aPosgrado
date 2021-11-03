<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoTrabajo extends Model
{
    use HasFactory;
    protected $table = 'equipoTrabajos';
    protected $fillable = [
        'nombre',
        'cargo',
        'descripcion',
     
    ];

}
