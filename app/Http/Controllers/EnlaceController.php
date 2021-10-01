<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EnlaceController extends Controller
{

    public function index()
    {
        return Enlace::get();
    }

    public function store(Request $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/enlace');
                $url = Storage::url($fileImagen);
                $urlImagen=asset($url);
                $enlace = new Enlace();
                $enlace->urlImagen = $urlImagen;
                $enlace->titulo = $request->titulo;
                $enlace->descripcion = $request->descripcion;
                $enlace->link = $request->link;
                return $enlace->save();
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
    public function update(Request $request, Enlace $enlace)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/enlace');
                $url = Storage::url($fileImagen);
                $urlImagen=asset($url);
                $enlace = Enlace::find($request->id);
                $enlace->urlImagen = $urlImagen;
                $enlace->titulo= $request->titulo;
                $enlace->descripcion = $request->descripcion;
                $enlace->link = $request->link;
                return $enlace->save();
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
                $enlace = Enlace::find($request->id);
                $enlace->titulo = $request->titulo;
                $enlace->descripcion = $request->descripcion;
                $enlace->link = $request->link;
                return $enlace->save();
            }
            catch (\Exception $e) 
            {

                return $e->getMessage();
            }
        } 
    }

    public function destroy(Enlace $enlaces_api)
    {
        $enlaces_api->delete();
    }
}
