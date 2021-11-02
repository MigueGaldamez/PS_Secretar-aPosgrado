<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleNoticia extends Model
{
    use HasFactory;
    protected $table = 'detalleNoticias';
    protected $fillable = [
        'orden',
        'descripcion',
        'noticia_id',    
    ];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class,'noticia_id','id');
    }
}
