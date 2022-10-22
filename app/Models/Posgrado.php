<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facultades;
use App\Models\TipoPrograma;
class Posgrado extends Model
{
    use HasFactory;
    protected $fillable = [
        'urlImagen',
        'facultad_id',
        'nombre',
        'descripcion',
        'titulo',
        'tipo_programa_id',
        'ofertado',
    ];
    protected $with = ['facultad','tipo_programa','tesis','inv'];
    public function facultad()
    {
        return $this->belongsTo(Facultades::class,'facultad_id','id');
    }
    public function tipo_programa()
    {
        return $this->belongsTo(TipoPrograma::class);
    }
    public function tesis()
    {
        return $this->hasMany(Tesi::class)->where('estado','=',1);
    }
    public function inv()
    {
        return $this->hasMany(Tesi::class)->where('estado','=',0);
    }
    //para filtros
    public function scopeNombre($query, $nombre)
    {
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%");
    }
    public function scopeFacultad($query, $facultad)
    {
        if( $facultad)
            return $query->where('facultad_id', '=', $facultad);
    }
    public function scopeOfertado($query, $ofertado)
    {
        if($ofertado == 1 || $ofertado == 0  || $ofertado !="none")
        {
            return $query->where('ofertado', '=', "$ofertado");
        }
        else
        {
            return null;
        }
    }
}
