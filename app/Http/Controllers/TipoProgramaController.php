<?php

namespace App\Http\Controllers;

use App\Models\TipoPrograma;
use Illuminate\Http\Request;

class TipoProgramaController extends Controller
{

    public function index()
    {
        return TipoPrograma::get();
    }

    public function store(Request $request)
    {
        try
        {
            $tipoPrograma = new TipoPrograma();
            $tipoPrograma->nombre = $request->nombre;
            $tipoPrograma->save();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    public function update(Request $request, TipoPrograma $tipo_programas_api)
    {
        try
        {
            $tipo_programas_api->update($request->all());
            return "Guardado";
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
    
    public function destroy(TipoPrograma $tipo_programas_api)
    {
        try
        {
            $tipo_programas_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
