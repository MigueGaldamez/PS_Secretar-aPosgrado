<?php

namespace App\Http\Controllers;

use App\Models\Valores;
use Illuminate\Http\Request;

class ValoresController extends Controller
{
    public function index()
    {
        return Valores::get();
    }
    public function store(Request $request)
    {
        $valor =  new Valores();
        
        return $valor->create($request->all());
    }
    public function getValores($informacion_id)
    {
        $valores = Valores::where('informacion_id',$informacion_id)->get();
        return $valores;
    }
    public function destroy(Valores $valore)
    {
        
        $valore->delete();
    }
}
