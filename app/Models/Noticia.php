<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticias';
    protected $fillable = [
        'urlImagen',
        'titulo',
        'publicado',
        'cuerpo',  
        'slug',
    ];
    //para filtros
    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
            return $query->where('titulo', 'LIKE', "%$titulo%");
    }
    public function scopePublicado($query, $publicado)
    {
        if($publicado == 1 || $publicado == 0)
            return $query->where('publicado', '=', "$publicado");
    }
    public function getCreatedAtAttribute($value)
    {
        $fecha = substr($value, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }
}
