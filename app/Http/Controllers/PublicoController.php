<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use App\Models\EquipoTrabajo;
use Illuminate\Http\Request;
use App\Models\Facultades;
use App\Models\Informacion;
use App\Models\Posgrado;
use App\Models\ReseniaHistorica;
class PublicoController extends Controller
{
    //
    public function inicio()
    {
        $informacion = Informacion::first();
        return view('publico.index',compact('informacion'));
    }
    public function reseña()
    {
        $resenias = ReseniaHistorica::all();
        return view('publico.reseñaHistorica',compact('resenias'));
    }
    public function oferta()
    {
        $facultadesF = Facultades::with('posgrados')->where('multidis','=',0)->get();
        $facultadesS = Facultades::with('posgrados')->where('multidis','=',1)->get();
        //$facultades = Facultades::all();
        return view('publico.ofertaAcademica',compact('facultadesF','facultadesS'));
    }
    public function ofertaFacultad($id)
    {
        $facultad = Facultades::findorFail($id);
        //$posgrados = Posgrado::where()
        return view('publico.ofertaAcademicaFacultad',compact('facultad'));
    }
    public function preguntasFrecuentes()
    {
        return view('publico.preguntasFrecuentes');
    }
    public function enlaces()
    {
        $enlacesMas = Enlace::skip(0)->take(5)->get();
        $enlaces = Enlace::all();
        return view('publico.enlacesImportantes',compact('enlaces','enlacesMas'));
    }
    public function noticias()
    {
        return view('publico.noticias');
    }
    public function investigaciones(){
        return view('publico.investigaciones');
    }
    public function organos(){
        $equipoTrabajo = EquipoTrabajo::all();
        return view('publico.organos',compact('equipoTrabajo'));
    }
    public function noticia(){
        return view('publico.noticiaDetalle');
    }
    public function diplomados(){
        $facultades = Facultades::all();
        return view('publico.diplomados',compact('facultades'));
    } 
    public function galeria(){
        return view('publico.galeria');
    } 
    public function tesisPosgrados(){
        $facultades = Facultades::all();
        return view('publico.tesisPosgrados');
    }
    public function catalogoC(){
        return view('publico.catalogo');
    }
}
