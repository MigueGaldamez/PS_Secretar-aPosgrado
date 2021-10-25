<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Informacion;
class Valores extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'informacion_id',
    ];
    public function informacion()
    {
        return $this->belongsTo(Informacion::class);
    }
}
