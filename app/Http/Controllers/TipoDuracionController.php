<?php

namespace App\Http\Controllers;

use App\Models\TipoDuracion;
use Illuminate\Http\Request;

class TipoDuracionController extends Controller
{

    public function index()
    {
        return TipoDuracion::get();
    }

    public function store(Request $request)
    {
        try
        {
            $tipoDuracion = new TipoDuracion();
            $tipoDuracion->nombre = $request->nombre;
            $tipoDuracion->save();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
    public function update(Request $request, TipoDuracion $tipo_duracions_api)
    {
        try
        {
            $tipo_duracions_api->update($request->all());
            return "Guardado";
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    public function destroy(TipoDuracion $tipo_duracions_api)
    {
        try
        {
            $tipo_duracions_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
