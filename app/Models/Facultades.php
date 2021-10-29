<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diplomado;
use App\Models\Posgrado;
class Facultades extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'urlImagen',
        'nombre',
        'telefonoPosgrado',
        'extPosgrado',
        'correoPosgrado',
        'color',
        'descripcion',
    ];
    public function diplomados()
    {
        return $this->hasMany(Diplomado::class);
    }
    public function posgrados()
    {
        return $this->hasMany(Posgrado::class);
    }
}
