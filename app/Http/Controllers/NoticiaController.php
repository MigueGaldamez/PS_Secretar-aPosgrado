<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NoticiaRequest;
use Illuminate\Support\Str as Str;
class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $titulo  = $request->get('titulo');
    	$publicado = $request->get('publicado');
        $per_page= $request->per_page;
        return Noticia::orderBy('id', 'DESC')->titulo($titulo)->publicado($publicado)->paginate($per_page);
    }
    public function store(NoticiaRequest $request)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/noticias');
                $url = Storage::url($fileImagen);
                $noticia = new Noticia();
                $urlImagen =  $url;
                
                $noticia->urlImagen = $urlImagen;
                $noticia->titulo = $request->titulo;
                $noticia->publicado = $request->publicado;
                $noticia->destacado = $request->destacado;
                $noticia->slug = Str::slug($noticia->titulo);
                return $noticia->save();
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
    public function update(NoticiaRequest $request, Noticia $noticia_api)
    {
        if($request->hasFile('urlImagen'))
        {
            try
            {
                $fileImagen=$request->file('urlImagen')->store('public/noticias');
                $url= Storage::url($fileImagen);
                $urlImagen =  $url;
                $noticia_api = Noticia::find($request->id);
                $oldUrlImagen = explode('/',$noticia_api->urlImagen);
                Storage::delete('public/noticias/'.$oldUrlImagen[3]);
                $noticia_api->urlImagen = $urlImagen;
                $noticia_api->titulo = $request->titulo;
                $noticia_api->publicado = $request->publicado;
                $noticia_api->destacado = $request->destacado;
                $noticia_api->slug = Str::slug($noticia_api->titulo);
                return $noticia_api->save();
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
                $noticia_api = Noticia::find($request->id);
                $noticia_api->titulo = $request->titulo;
                $noticia_api->publicado = $request->publicado;
                $noticia_api->destacado = $request->destacado;
                $noticia_api->slug = Str::slug($noticia_api->titulo);
                return $noticia_api->save();
            }
            catch (\Exception $e) 
            {
                return $e->getMessage();
            }
        }  
    }
    public function destroy(Noticia $noticia_api)
    {
        try
        {
            $oldUrlImagen = explode('/',$noticia_api->urlImagen);
            Storage::delete('public/noticias/'.$oldUrlImagen[3]);
            return $noticia_api->delete();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }

    }
    public function detalleNoticiaGuardar(Request $request, Noticia $noticia_id)
    {
        $validated = $request->validate([
            'cuerpo'=>'required|max:60000',
        ]);
        $noticia_id->cuerpo = $request->cuerpo;
        $noticia_id->save();
        return redirect()->route('NoticiasGestion');
    }
}
