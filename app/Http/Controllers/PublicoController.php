<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('publico.ofertaAcademica');
    }
    public function preguntasFrecuentes()
    {
        return view('publico.preguntasFrecuentes');
    }
    public function enlaces()
    {
        return view('publico.enlacesImportantes');
    }
}
