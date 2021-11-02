<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticias';
    protected $fillable = [
        'titulo',
        'fechaPublicacion',
        'autor',    
    ];

    public function detallenoticia()
    {
        return $this->hasMany(DetalleNoticia::class,'id','noticia_id');
    }
}
