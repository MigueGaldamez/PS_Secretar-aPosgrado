<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Tesi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'publicado',
        'titulo',
        'autor',    
        'link',
    ];
    
    public function posgrado()
    {
        return $this->belongsTo(Posgrado::class);
    }
     //para filtros
    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
            return $query->where('titulo', 'LIKE', "%$titulo%");
    }
    
    public function scopeFacultad($query, $facultad)
    {
        if( $facultad)
        {
            return $query->whereRelation('posgrado', 'facultad_id', $facultad);
/*             return $query->whereHas('posgrado', function (Builder $query1)
            {
                $query1->where('facultad_id',$facultad);
            }); */
        }
    }  
    public function scopePosgrados($query, $posgrado)
    {
        if( $posgrado)
            return $query->where('posgrado_id', '=', $posgrado);
    } 
    public function scopeEstado($query, $estado)
    {
        if($estado == 1 || $estado == 0 || $estado  !="none")
            return $query->where('estado', '=', "$estado");
    }
    public function scopePublicado($query, $publicado)
    {
        if($publicado)
            return $query->where('publicado','=',$publicado);
    } 
}
