<?php

namespace App\Http\Controllers;

use App\Models\Facultades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FacultadesController extends Controller
{
    
    public function index()
    {
        return Facultades::with('posgrados')->get();
    }
    public function store(Request $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/facultad');
                $url = Storage::url($fileImagen);
                $urlImagen=asset($url);
                $facultad = new Facultades();
                $facultad->urlImagen = $urlImagen;
                $facultad->nombre = $request->nombre;
                $facultad->contactoDiplomado = $request->contactoDiplomado;
                $facultad->telefonoPosgrado = $request->telefonoPosgrado;
                $facultad->extPosgrado = $request->extPosgrado;
                $facultad->correoPosgrado = $request->correoPosgrado;
                $facultad->color = $request->color;
                $facultad->multidis = $request->multidis;
                $facultad->descripcion = $request->descripcion;
                return $facultad->save();
            }
            catch (\Exception $e) 
            {

                return $e->getMessage();
            }
        }
        else
        {
            return "error";
        }   
    }
    public function update(Request $request, Facultades $facultad)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/facultad');
                $url = Storage::url($fileImagen);
                $urlImagen=asset($url);
                $facultad = Facultades::find($request->id);
                $facultad->urlImagen = $urlImagen;
                $facultad->nombre = $request->nombre;
                $facultad->contactoDiplomado = $request->contactoDiplomado;
                $facultad->telefonoPosgrado = $request->telefonoPosgrado;
                $facultad->extPosgrado = $request->extPosgrado;
                $facultad->correoPosgrado = $request->correoPosgrado;
                $facultad->color = $request->color;
                $facultad->multidis = $request->multidis;
                $facultad->descripcion = $request->descripcion;
                return $facultad->save();
            }
            catch (\Exception $e) 
            {

                return $e->getMessage();
            }

        }
        else
        {
            try
            {
                $facultad = Facultades::find($request->id);
                $facultad->nombre = $request->nombre;
                $facultad->contactoDiplomado = $request->contactoDiplomado;
                $facultad->telefonoPosgrado = $request->telefonoPosgrado;
                $facultad->extPosgrado = $request->extPosgrado;
                $facultad->correoPosgrado = $request->correoPosgrado;
                $facultad->color = $request->color;
                $facultad->multidis = $request->multidis;
                $facultad->descripcion = $request->descripcion;
                return $facultad->save();
            }
            catch (\Exception $e) 
            {

                return $e->getMessage();
            }
        }  
    }
    public function destroy(Facultades $facultades)
    {
        //
    }
}
