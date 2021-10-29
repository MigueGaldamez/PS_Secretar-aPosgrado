<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Posgrado;
class TipoPrograma extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];
    public function posgrados()
    {
        return $this->hasMany(Posgrado::class);
    }
}
