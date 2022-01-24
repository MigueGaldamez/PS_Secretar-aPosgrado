<?php

namespace App\Http\Controllers;

use App\Models\Facultades;
use App\Models\Posgrado;
use Illuminate\Http\Request;
use App\Http\Requests\FacultadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
use App\Models\Tesi;
class FacultadesController extends Controller
{
    public function list()
    {
        return Facultades::with('posgrados')->get();
    }
    public function index(Request $request)
    {
        $per_page= $request->per_page;
        return Facultades::with('posgrados')->paginate($per_page);
    }
    public function facultadesS()
    {
        return Facultades::with('posgrados')->where('multidis','=',1)->get();
    }
    public function facultadesF()
    {
        return Facultades::with('posgrados')->where('multidis','=',0)->get();
    }
    public function store(FacultadRequest $request)
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
                $facultad->slug = Str::slug($request->nombre);
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
            return "No has elejido un archivo.";
        }   
    }
    public function update(FacultadRequest $request, Facultades $facultad)
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
                $facultad->slug = Str::slug($request->nombre);
                
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
                $facultad->slug = Str::slug($request->nombre);
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
        $facultades = Facultades::with('posgradosConTesis')->get();
        return $facultades;
        
    }
    public function facultadesConInv(){
        $tesis = Tesi::where('estado','=',0)->pluck('posgrado_id');
        $posgrados = Posgrado::whereIn('id',$tesis)->pluck('facultad_id');
        $facultades = Facultades::with('posgradosConInv')->get();
        return $facultades;
        
    }
    public function getFacultadbyId(Request $request){
        
        $posgrados = Posgrado::where('facultad_id','=',$request->idFacultad)->paginate($request->per_page);
        return $posgrados;
    }
}
