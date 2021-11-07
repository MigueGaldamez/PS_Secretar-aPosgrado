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
    protected $primaryKey = 'id';
    protected $fillable = [
        'urlImagen',
        'nombre',
        'contactoDiplomado',
        'telefonoPosgrado',
        'extPosgrado',
        'correoPosgrado',
        'color',
        'multidis', 
        'descripcion',
    ];
    
    public function diplomados()
    {
        return $this->hasMany(Diplomado::class,'facultad_id','id');
    }
    public function posgrados()
    {
        return $this->hasMany(Posgrado::class,'facultad_id','id');
    }
}
