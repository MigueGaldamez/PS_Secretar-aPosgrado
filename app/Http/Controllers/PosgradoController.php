<?php

namespace App\Http\Controllers;

use App\Models\Posgrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PosgradoController extends Controller
{
    public function index(Request $request)
    {
        $per_page=$request->per_page;
        return Posgrado::get();
    }
    public function store(Request $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/posgrados');
                $urlImagen = Storage::url($fileImagen);
                $posgrado = new Posgrado();
                $posgrado->urlImagen = $urlImagen;
                $posgrado->facultad_id = $request->facultad;
                $posgrado->nombre = $request->nombre;
                $posgrado->descripcion = $request->descripcion;
                $posgrado->titulo = $request->titulo;
                $posgrado->tipo_programa_id = $request->tipo_programa;
                $posgrado->ofertado = $request->ofertado;
                return $posgrado->save();
            }
            catch (\Exception $e) 
            {

                return $e->getMessage();
            }

        }
        else
        {
            return 0;
        }   

    }
    public function update(Request $request, Posgrado $posgrados_api)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/posgrados');
                $urlImagen = Storage::url($fileImagen);
                $posgrados_api = Posgrado::find($request->id);
                $oldUrlImagen = explode('/',$posgrados_api->urlImagen);
                Storage::delete('public/posgrados/'.$oldUrlImagen[3]);
                $posgrados_api->urlImagen = $urlImagen;
                $posgrados_api->facultad_id = $request->facultad;
                $posgrados_api->nombre = $request->nombre;
                $posgrados_api->descripcion = $request->descripcion;
                $posgrados_api->titulo = $request->titulo;
                $posgrados_api->tipo_programa_id = $request->tipo_programa;
                $posgrados_api->ofertado = $request->ofertado;
                return $posgrados_api->save();
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
                $posgrados_api = Posgrado::find($request->id);
                $posgrados_api->facultad_id = $request->facultad;
                $posgrados_api->nombre = $request->nombre;
                $posgrados_api->descripcion = $request->descripcion;
                $posgrados_api->titulo = $request->titulo;
                $posgrados_api->tipo_programa_id = $request->tipo_programa;
                $posgrados_api->ofertado = $request->ofertado;
                return $posgrados_api->save();
            }
            catch (\Exception $e) 
            {
                return $e->getMessage();
            }
        }  
    }
    public function destroy(Posgrado $posgrados_api)
    {
        try
        {
            $posgrados_api->delete();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }
}
