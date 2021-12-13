<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use App\Models\Valores;
use Illuminate\Http\Request;
use App\Http\Requests\InfoSecretariaRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Polyfill\Intl\Idn\Info;

class InformacionController extends Controller
{
    public function index()
    {
        
        $valores = Informacion::with('valores')->get();
        return $valores;
    }
    public function show(Informacion $informacion)
    {
        return $informacion;
    }
    public function update(InfoSecretariaRequest $request, Informacion $informacion)
    {
        if($request->hasFile('urlLogo'))
        {
            $fileImagen=$request->file('urlLogo')->store('public/info');
            $url = Storage::url($fileImagen);
            $urlLogo=asset($url);
            $informacion = Informacion::find($request->id);
            $informacion->horarioAtencion  =$request->horarioAtencion;
            $informacion->correo=$request->correo;
            $informacion->mision=$request->mision;
            $informacion->vision=$request->vision;
            $informacion->quienesSomos=$request->quienesSomos;
            $informacion->urlLogo=$urlLogo;
            return $informacion->save();
        }
        else
        {
            $informacion = Informacion::find($request->id);
            $informacion->horarioAtencion  =$request->horarioAtencion;
            $informacion->correo=$request->correo;
            $informacion->mision=$request->mision;
            $informacion->vision=$request->vision;
            $informacion->quienesSomos=$request->quienesSomos;
            return $informacion->save();
        }   
    }

}
