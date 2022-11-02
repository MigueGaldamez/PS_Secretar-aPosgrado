<?php

namespace App\Http\Controllers;

use App\Models\Posgrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PosgradoRequest;
use App\Models\Facultades;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class PosgradoController extends Controller
{
    public function list(Facultades $facultad)
    {
        return Posgrado::where('facultad_id',$facultad->id)->get();
    }
    public function index(Request $request)
    {
        $nombre  = $request->get('nombre');
    	$facultad = $request->get('facultad');
    	$ofertado  = $request->get('ofertado');
        $per_page= $request->per_page;
        return Posgrado::orderBy('id', 'DESC')->nombre($nombre)->facultad($facultad)->ofertado($ofertado)->paginate($per_page);
    }
    public function store(PosgradoRequest $request)
    {
        try
        {
            if($request->hasFile('urlImagen'))
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
            else
            {
                $request->validate(['urlImagen'=>'required|image|max:1024']);
            }
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function update(PosgradoRequest $request, Posgrado $posgrados_api)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/posgrados');
                $urlImagen = Storage::url($fileImagen);
                $oldUrlImagen = explode('/',$posgrados_api->urlImagen);
                if($oldUrlImagen[3] ?? false){
                    Storage::delete('public/posgrados/'.$oldUrlImagen[3]);
                }
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
            $oldUrlImagen = explode('/',$posgrados_api->urlImagen);
            Storage::delete('public/posgrados/'.$oldUrlImagen[3]);
            return $posgrados_api->delete();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
}
