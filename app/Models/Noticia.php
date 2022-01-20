<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticias';
    protected $fillable = [
        'urlImagen',
        'titulo',
        'publicado',
        'cuerpo',    
    ];
    //para filtros
    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
            return $query->where('titulo', 'LIKE', "%$titulo%");
    }
    public function scopePublicado($query, $publicado)
    {
        if($publicado == 1 || $publicado == 0)
            return $query->where('publicado', '=', "$publicado");
    }
}
