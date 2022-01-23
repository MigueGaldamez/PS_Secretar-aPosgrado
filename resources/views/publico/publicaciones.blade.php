@extends('layouts.frontend',['subtitulo' => 'Publicaciones'])

@section('content')

@include('publico.cabecera',['titulo' => 'Publicaciones','descripcion'=>'de la Universidad de El Salvador'])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Misión y Visión de la Universidad de El Salvador</span></h3>
</div>
<div class="container"> 
        <div class="row my-3 my-sm-3 my-lg-1 my-md-1">
           
           
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12  my-1  my-md-5  my-lg-4">
                <div class=" callout callout-danger row shadow-lg">
                    <div class="col col-12 ">
                    
                       <h3><span><b>Misión</b></span></h3>
                        <span>Es el máximo organismo normativo y elector de la universidad; es, además, el órgano supremo para la interpretación de sus fines y la conservación de sus instituciones, todo dentro del marco de las atribuciones que la Ley Organiza de la Universidad de El Salvador determina (artículo 16, Ley Orgánica de la Universidad de El Salvador).</span>
                            
                    </div>
                  
                </div>
            </div>
             <div class="col col-lg-6 col-md-6 col-sm-12 col-12  my-1  my-md-5  my-lg-4">
                <div class=" callout callout-danger row shadow-lg">
                    <div class="col col-12 ">
                    
                        <h3><span><b>Visión</b></span></h3>
                       
                        <span>Es el máximo organismo en las funciones administrativas, docente, técnica y disciplinaria de la universidad; al efecto, dictará las resoluciones pertinentes para el cumplimiento de las disposiciones de esta ley y los reglamentos universitarios correspondientes.</span>
                            
                    </div>
                   
                </div>
            </div>
        
    </div>
</div>



@endsection
