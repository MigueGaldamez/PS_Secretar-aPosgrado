<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facultades;
use App\Models\TipoDuracion;
use App\Models\Modalidades;

class Diplomado extends Model
{
    use HasFactory;
    protected $fillable = [
        'facultad_id',
        'nombre',
        'duracion',
        'tipo_duracion_id',
        'modalidad_id',
        'ofertado',
    ];
    protected $with = ['facultad','tipo_duracion','modalidad'];
    public function facultad()
    {
        return $this->belongsTo(Facultades::class);
    }
    public function tipo_duracion()
    {
        return $this->belongsTo(TipoDuracion::class);
    }
    public function modalidad()
    {
        return $this->belongsTo(Modalidades::class);
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
        if($ofertado == 1 || $ofertado == 0)
            return $query->where('ofertado', '=', "$ofertado");
    }
    public function scopeModalidad($query, $modalidad)
    {
        if($modalidad)
            return $query->where('modalidad_id','=',$modalidad);
    }
}
