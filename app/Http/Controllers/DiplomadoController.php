<?php

namespace App\Http\Controllers;

use App\Models\Diplomado;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class DiplomadoController extends Controller
{
    public function list()
    {
        return Diplomado::get();
    }
    public function index(Request $request)
    {
        $per_page= $request->per_page;
        return Diplomado::paginate($per_page);
    }
    public function store(Request $request)
    {
        try
        {
            $diplomado = new Diplomado();
            $diplomado->facultad_id = $request->facultad;
            $diplomado->nombre = $request->nombre;
            $diplomado->duracion = $request->duracion;
            $diplomado->tipo_duracion_id =$request->tipo_duracion;
            $diplomado->modalidad_id =$request->modalidad;
            $diplomado->ofertado =$request->ofertado;
            return $diplomado->save();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function update(Request $request, Diplomado $diplomados_api)
    {
        try
        {
            $diplomados_api->facultad_id = $request->facultad;
            $diplomados_api->nombre = $request->nombre;
            $diplomados_api->duracion = $request->duracion;
            $diplomados_api->tipo_duracion_id =$request->tipo_duracion;
            $diplomados_api->modalidad_id =$request->modalidad;
            $diplomados_api->ofertado =$request->ofertado;
            return $diplomados_api->save();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function destroy(Diplomado $diplomados_api)
    {
        return $diplomados_api->delete();
    }
}
