<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permiso';
    
    public function opcionPermiso()
    {
        return $this->BelongsTo(opcionPermiso::class,'opcionPermiso_id','id');
    }
}
