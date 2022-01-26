<?php

namespace App\Http\Controllers;

use App\Models\Diplomado;
use App\Models\Noticia;
use App\Models\Posgrado;
use App\Models\Tesi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cantPosgrados = Posgrado::count();
        $cantDiplomados = Diplomado::count();
        $cantTesis = Tesi::where('estado','=',1)->count();
        $cantInvestigaciones = Tesi::where('estado','=',0)->count();
        $cantNoticias = Noticia::count();
        return view('home', compact('cantPosgrados','cantDiplomados','cantTesis','cantInvestigaciones','cantNoticias'));
    }
}
