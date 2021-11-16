<?php

namespace App\Http\Controllers;

use App\Models\EquipoTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EquipoTrabajoController extends Controller
{

    public function index(Request $request)
    {
        return EquipoTrabajo::paginate($request->perpage);
    }
    public function store(Request $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/equipo');
                $url = Storage::url($fileImagen);
                $equipo = new EquipoTrabajo();
                $urlImagen =  $url;
                $equipo->urlImagen = $urlImagen;
                $equipo->nombre = $request->nombre;
                $equipo->descripcion = $request->descripcion;
                $equipo->cargo = $request->cargo;
                return  $equipo->save();
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
    public function update(Request $request, EquipoTrabajo $equipoTrabajo)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/equipo');
                $url = Storage::url($fileImagen);
                $urlImagen =  $url;
                $equipoTrabajo = EquipoTrabajo::find($request->id);
                $oldUrlImagen = explode('/',$equipoTrabajo->urlImagen);
                Storage::delete('public/equipo/'.$oldUrlImagen[3]);
                $equipoTrabajo->urlImagen = $urlImagen;
                $equipoTrabajo->nombre = $request->nombre;
                $equipoTrabajo->descripcion = $request->descripcion;
                $equipoTrabajo->cargo = $request->cargo;
                
                return $equipoTrabajo->save();
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
                $equipoTrabajo = EquipoTrabajo::find($request->id);
                $equipoTrabajo->nombre = $request->nombre;
                $equipoTrabajo->descripcion = $request->descripcion;
                $equipoTrabajo->cargo = $request->cargo;
                return $equipoTrabajo->save();
            }
            catch (\Exception $e) 
            {
                return $e->getMessage();
            }
        }  
    }
    public function destroy(EquipoTrabajo $equipoTrabajo)
    {
        $oldUrlImagen = explode('/',$equipoTrabajo->urlImagen);
        Storage::delete('public/equipo/'.$oldUrlImagen[3]);
        $equipoTrabajo->delete();
    }
}
