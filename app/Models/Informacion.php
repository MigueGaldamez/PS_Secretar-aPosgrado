<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Valores;
class Informacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'urlLogo',
        'quienesSomos',
        'mision',
        'vision',
        'correo',
        'horarioAtencion',
    ];
    public function valores()
    {
        return $this->hasMany(Valores::class);
    }
}
