<?php

namespace App\Http\Controllers;

use App\Models\Tesi;
use Illuminate\Http\Request;

class TesiController extends Controller
{

    public function index()
    {
        return Tesi::with('posgrado')->get();
    }
    public function store(Request $request)
    {
        try
        {
            $tesi = new Tesi();
            $tesi->posgrado_id = $request->posgrado;
            $tesi->publicado = $request->publicado;
            $tesi->titulo = $request->titulo;
            $tesi->autor = $request->autor;
            $tesi->link = $request->link;
            return $tesi->save();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function update(Request $request, Tesi $tesis_api)
    {
        try
        {
            $tesis_api->posgrado_id = $request->posgrado;
            return $tesis_api->update($request->all());
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function destroy(Tesi $tesis_api)
    {
        try
        {
            $tesis_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
