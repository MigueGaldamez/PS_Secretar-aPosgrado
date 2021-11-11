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
                $facultad = new Facultades();
                $urlImagen =  $url;
                $facultad->urlImagen = $urlImagen;
                $facultad->nombre = $request->nombre;
                $facultad->contactoDiplomado = $request->contactoDiplomado;
                $facultad->contactoPosgrado = $request->contactoPosgrado;
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
                return "No has elejido un archivo.";
            }
            catch (\Exception $e) 
            {

                return $e->getMessage();
            }
            
        }   
    }
    public function update(Request $request, Facultades $facultad)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/facultad');
                $url= Storage::url($fileImagen);
                $urlImagen =  $url;
                $facultad = Facultades::find($request->id);
                $oldUrlImagen = explode('/',$facultad->urlImagen);
                Storage::delete('public/facultad/'.$oldUrlImagen[3]);
                $facultad->urlImagen = $urlImagen;
                $facultad->nombre = $request->nombre;
                $facultad->contactoDiplomado = $request->contactoDiplomado;
                $facultad->contactoPosgrado = $request->contactoPosgrado;
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
                $facultad->contactoPosgrado = $request->contactoPosgrado;
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
