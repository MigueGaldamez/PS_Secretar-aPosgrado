<?php

namespace App\Http\Controllers;

use App\Models\TipoPrograma;
use Illuminate\Http\Request;
use App\Http\Requests\TipoDuracionRequest;

class TipoProgramaController extends Controller
{

    public function index()
    {
        return TipoPrograma::get();
    }

    public function store(TipoDuracionRequest $request)
    {
        try
        {
            $tipoPrograma = new TipoPrograma();
            $tipoPrograma->nombre = $request->nombre;
            return $tipoPrograma->save();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    public function update(TipoDuracionRequest $request, TipoPrograma $tipo_programas_api)
    {
        try
        {
            return $tipo_programas_api->update($request->all());
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
            return $tipo_programas_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
