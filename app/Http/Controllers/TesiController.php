<?php

namespace App\Http\Controllers;

use App\Http\Requests\TesisRequest;
use App\Models\Tesi;
use Illuminate\Http\Request;

class TesiController extends Controller
{
    public function list()
    {
        return Tesi::get();
    }
    public function index(Request $request)
    {
        $per_page= $request->per_page;
        return Tesi::with('posgrado')->paginate($per_page);
    }
    public function store(TesisRequest $request)
    {
        try
        {
            $tesi = new Tesi();
            $tesi->posgrado_id = $request->posgrado;
            $tesi->publicado = $request->publicado;
            $tesi->titulo = $request->titulo;
            $tesi->autor = $request->autor;
            $tesi->link = $request->link;
            $tesi->estado = $request->estado;
            return $tesi->save();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function update(TesisRequest $request, Tesi $tesis_api)
    {
        try
        {
            $tesis_api->posgrado_id = $request->posgrado;
            $tesis_api->estado = $request->estado;
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
            return $tesis_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
