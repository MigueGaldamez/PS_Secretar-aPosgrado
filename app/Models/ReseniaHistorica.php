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
}
