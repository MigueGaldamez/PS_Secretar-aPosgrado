<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReseniaHistorica extends Model
{
    use HasFactory;
    protected $table = 'reseniaHistoricas';
    protected $fillable = [
        'anio',
        'importancia',
        'descripcion',
    ];
    public function scopeImportancia($query, $importancia)
    {
        if($importancia == 1 ||$importancia == 2 || $importancia == 3)
            return $query->where('importancia', '=', $importancia);
    }
    public function scopeAnio($query, $anio)
    {
        if($anio)
            return $query->where('anio','=',"$anio");
    } 
}
