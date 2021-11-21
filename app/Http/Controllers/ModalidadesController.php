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
            if($request->color == 'Azul'){
                $modalidad->clase = "bg-primary";
            }elseif($request->color == 'Verde'){
                $modalidad->clase = "bg-success";
            }elseif($request->color == 'Rojo'){
                $modalidad->clase = "bg-danger";
            }elseif($request->color == 'Amarillo'){
                $modalidad->clase = "bg-warning text-dark";
            }elseif($request->color == 'Gris'){
                $modalidad->clase = "bg-secondary";
            }
            return $modalidad->save();
        
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
            $modalidad = $modalidades_api;
            $modalidad->nombre = $request->nombre;
            $modalidad->color = $request->color;
            if($request->color == 'Azul'){
                $modalidad->clase = "bg-primary";
            }elseif($request->color == 'Verde'){
                $modalidad->clase = "bg-success";
            }elseif($request->color == 'Rojo'){
                $modalidad->clase = "bg-danger";
            }elseif($request->color == 'Amarillo'){
                $modalidad->clase = "bg-warning text-dark";
            }elseif($request->color == 'Gris'){
                $modalidad->clase = "bg-secondary";
            }
            return $modalidad->save();
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
            return $modalidades_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
