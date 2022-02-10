<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use App\Models\EquipoTrabajo;
use Illuminate\Http\Request;
use App\Models\Facultades;
use App\Models\Informacion;
use App\Models\Noticia;
use App\Models\Galery;
use App\Models\Posgrado;
use App\Models\ReseniaHistorica;
class PublicoController extends Controller
{
    //
    public function inicio()
    {
        $noticias = Noticia::where('publicado',1)->where('destacado',1)->latest()->take(4)->get();
        $informacion = Informacion::first();
        return view('publico.index',compact('informacion','noticias'));
    }
    public function reseña()
    {
        $resenias = ReseniaHistorica::all();
        return view('publico.reseñaHistorica',compact('resenias'));
    }
    public function publicaciones()
    {
     
        return view('publico.publicaciones');
    }
    public function oferta()
    {
        $facultadesF = Facultades::with('posgrados')->where('multidis','=',0)->get();
        $facultadesS = Facultades::with('posgrados')->where('multidis','=',1)->get();
        //$facultades = Facultades::all();
        return view('publico.ofertaAcademica',compact('facultadesF','facultadesS'));
    }
    public function ofertaFacultad($slug)
    {
        $facultad = Facultades::where('slug','=', $slug)->firstOrFail();
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
    public function noticias()//para vista de todas las noticias
    {
        $noticias = Noticia::where('publicado',1)->where('destacado',1)->latest()->take(4)->get();
        return view('publico.noticias',compact('noticias'));
    }
    public function noticiasTodas(Request $request)//para api
    {
        $per_page= $request->per_page;
        $noticias = Noticia::where('publicado',1)->latest()->paginate($per_page);
        return $noticias;
    }
    public function noticia($slug)//para ver 1 noticia
    {
        $noticias = Noticia::where('publicado',1)->where('destacado',1)->latest()->take(4)->get();
        $noticia= Noticia::where('slug','=', $slug)->where('publicado',1)->firstOrFail();
        return view('publico.noticiaDetalle',compact('noticia','noticias'));
    }
    public function investigaciones(){
        return view('publico.investigaciones');
    }
    public function organos(){
        $equipoTrabajo = EquipoTrabajo::all();
        return view('publico.organos',compact('equipoTrabajo'));
    }

    public function diplomados(){
        $facultades = Facultades::all();
        return view('publico.diplomados',compact('facultades'));
    } 
    public function galeria(){
        $fotos1 = Galery::where('orden','=',1)->get();
        $fotos2 = Galery::where('orden','=',2)->get();
        $fotos3 = Galery::where('orden','=',3)->get();
        $fotos4 = Galery::where('orden','=',4)->get();
        return view('publico.galeria',compact('fotos1','fotos2','fotos3','fotos4'));
    } 
    public function tesisPosgrados(){
        $facultades = Facultades::all();
        return view('publico.tesisPosgrados');
    }
    public function catalogoC(){
        $informacion = Informacion::first();
        return view('publico.catalogo',compact('informacion'));
    }
    public function descargarCatalogo()
    {
        $informacion = Informacion::first();

        // $filePath =  public_path('catalogos/Catalogo Posgrados UES - 2022.pdf');
        // $headers = ['Content-Type: application/pdf'];
        // $fileName ='Catalogo Posgrados UES - 2022.pdf';
        return response($informacion->urlCatalogo);
        
    }
}
