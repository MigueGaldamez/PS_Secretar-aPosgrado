<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
