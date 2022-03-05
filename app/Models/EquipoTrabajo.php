<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoTrabajo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'equipoTrabajos';
    protected $fillable = [
        'urlImagen',
        'nombre',
        'cargo',
        'descripcion',
     
    ];

}
