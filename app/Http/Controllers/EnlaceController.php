<?php

namespace App\Http\Controllers;
use App\Http\Requests\EnlaceRequest;
use App\Models\Enlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EnlaceController extends Controller
{

    public function list()
    {
        return Enlace::get();
    }
    public function index(Request $request)
    {
        $per_page= $request->per_page;
        return Enlace::paginate($per_page);
    }

    public function store(EnlaceRequest $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/enlace');
                $urlImagen = Storage::url($fileImagen);
                $enlace = new Enlace();
                $enlace->urlImagen = $urlImagen;
                $enlace->titulo = $request->titulo;
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
    public function update(EnlaceRequest $request, Enlace $enlaces_api)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/enlace');
                $urlImagen = Storage::url($fileImagen);
                $oldUrlImagen = explode('/',$enlaces_api->urlImagen);
                Storage::delete('public/enlace/'.$oldUrlImagen[3]);
                $enlaces_api->urlImagen = $urlImagen;
                $enlaces_api->titulo= $request->titulo;
                $enlaces_api->link = $request->link;
                
                return $enlaces_api->save();
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
        return $enlaces_api->delete();
    }
}
