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
        'contactoPosgrado',
        'color',
        'multidis', 
        'descripcion',
        'slug',
    ];
    
    public function diplomados()
    {
        return $this->hasMany(Diplomado::class,'facultad_id','id');
    }
    public function posgrados()
    {
        return $this->hasMany(Posgrado::class,'facultad_id','id');
    }
    public function posgradosConTesis()
    {
        $tesis = Tesi::where('estado','=',1)->pluck('posgrado_id');
        return $this->hasMany(Posgrado::class,'facultad_id','id')->whereIn('id',$tesis);
    }
    public function posgradosConInv()
    {
        $tesis = Tesi::where('estado','=',0)->pluck('posgrado_id');
        return $this->hasMany(Posgrado::class,'facultad_id','id')->whereIn('id',$tesis);
    }
}
