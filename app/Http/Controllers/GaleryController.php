<?php
namespace App\Http\Controllers;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class GaleryController extends Controller
{
    public function index()
    {
        return Galery::get();
    }
    public function store(Request $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/galery');
                $url = Storage::url($fileImagen);
                $galery = new Galery();
                $urlImagen =  $url;
                $galery->urlImagen = $urlImagen;
                $galery->titulo = $request->titulo;
                $galery->subtitulo = $request->subtitulo;
                return $galery->save();
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
    public function update(Request $request, galery $galery_api)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/galery');
                $url= Storage::url($fileImagen);
                $urlImagen =  $url;
                $galery_api = Galery::find($request->id);
                $oldUrlImagen = explode('/',$galery_api->urlImagen);
                Storage::delete('public/galery/'.$oldUrlImagen[3]);
                $galery_api->urlImagen = $urlImagen;
                $galery_api->titulo = $request->titulo;
                $galery_api->subtitulo = $request->subtitulo;
                
                return $galery_api->save();
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
                $galery_api = Galery::find($request->id);
                $galery_api->titulo = $request->titulo;
                $galery_api->subtitulo = $request->subtitulo;
                return $galery_api->save();
            }
            catch (\Exception $e) 
            {
                return $e->getMessage();
            }
        }  
    }
    public function destroy(galery $galery_api)
    {
        $oldUrlImagen = explode('/',$galery_api->urlImagen);
        Storage::delete('public/galery/'.$oldUrlImagen[3]);
        $galery_api->delete();
    }
}
