<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultades;

class PublicoController extends Controller
{
    //
    public function inicio()
    {
        return view('publico.index');
    }
    public function reseña()
    {
        return view('publico.reseñaHistorica');
    }
    public function oferta()
    {
        $facultades = Facultades::all();
        return view('publico.ofertaAcademica',compact('facultades'));
    }
    public function ofertaFacultad()
    {
        return view('publico.ofertaAcademicaFacultad');
    }
    public function preguntasFrecuentes()
    {
        return view('publico.preguntasFrecuentes');
    }
    public function enlaces()
    {
        return view('publico.enlacesImportantes');
    }
    public function noticias()
    {
        return view('publico.noticias');
    }
    public function investigaciones(){
        return view('publico.investigaciones');
    }
    public function organos(){
        return view('publico.organos');
    }
    public function noticia(){
        return view('publico.noticiaDetalle');
    }
    public function diplomados(){
        return view('publico.diplomados');
    } 
    public function tesisPosgrados(){
        $facultades = Facultades::all();
        return view('publico.tesisPosgrados',compact('facultades'));
    }
    
}
