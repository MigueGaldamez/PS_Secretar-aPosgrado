<?php

namespace App\Http\Controllers;

use App\Models\Facultades;
use App\Models\Posgrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Tesi;
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
    public function facultadesConTesis(){
        $tesis = Tesi::where('estado','=',1)->pluck('posgrado_id');
        $posgrados = Posgrado::whereIn('id',$tesis)->pluck('facultad_id');
        $facultades = Facultades::with('posgradosConTesis')->whereIn('id',$posgrados)->get();
        return $facultades;
        
    }
    public function facultadesConInv(){
        $tesis = Tesi::where('estado','=',0)->pluck('posgrado_id');
        $posgrados = Posgrado::whereIn('id',$tesis)->pluck('facultad_id');
        $facultades = Facultades::with('posgradosConInv')->whereIn('id',$posgrados)->get();
        return $facultades;
        
    }
}
