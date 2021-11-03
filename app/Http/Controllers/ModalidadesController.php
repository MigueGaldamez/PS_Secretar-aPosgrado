<?php

namespace App\Http\Controllers;

use App\Models\Modalidades;
use Illuminate\Http\Request;

class ModalidadesController extends Controller
{

    public function index()
    {
        return Modalidades::get();
    }

    public function store(Request $request)
    {
        try
        {
            $modalidad = new Modalidades();
            $modalidad->nombre = $request->nombre;
            $modalidad->color = $request->color;
            $modalidad->save();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    public function update(Request $request, Modalidades $modalidades_api)
    {
        try
        {
            $modalidades_api->update($request->all());
            return "Guardado";
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    public function destroy(Modalidades $modalidades_api)
    {
        try
        {
            $modalidades_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
