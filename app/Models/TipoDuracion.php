<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Diplomado;
class TipoDuracion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];
    public function diplomados()
    {
        return $this->hasMany(Diplomado::class);
    }
}
