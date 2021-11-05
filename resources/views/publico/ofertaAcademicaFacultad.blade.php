@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')



@include('publico.cabecera',['titulo' => 'Oferta Academica','descripcion'=>'Oferta academica en la Facultad de Humanidades.'])

<div class="colorGris text-center py-4 mt-4">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">{{$facultad->nombre}}</h1>
    <h5 class="text-light textoSuavecito">Aquí se muestran los posgrados de la facultad, tanto los ofertados como los no ofertados. </h5>
</div>
<div class="container-fluid ps-0 mt-4  mb-4">  
    <div class="card sinBordes mb-4 ">
        <div class="row">
            <div class="col col-lg-5 col-sm-12 col-12 h-100">
                <img  src="{{asset('img/oferta/IMG_4288.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col col-lg-7 col-sm-12 col-12 ">
                <div class="card-block px-4">
                  
                       
                    <h2 class="card-title textoSuavecito mb-0">Maestría en</h2>
                      
                   
                    <h1 class="textoDuro textoGris mt-0"><p class="card-text"><span class="bordeBajo">Microbiología e
                    Inocuidad de Alimentos</span></p></h1>
                    <p><b>Descripción:</b><br>El programa de Maestría en Microbiología e Inocuidad de
Alimentos, surge con el propósito de mejorar las condiciones de
alimentación y nutrición de la población salvadoreña, formar
profesionales eficientes en el manejo técnico y administrativo de
proyectos en el área de alimentos.
                    </p>
                    <h4 class="card-title textoSuavecito mb-0">Titulo a otorgar:</h4>
                    <h3 class="card-title textoSuavecito mb-0"><b>Maestro/a en Microbiología e
Inocuidad de Alimentos</b></h3>
                    <p class="card-text "><small >Ofertado en: <span class="badge rounded-pill bg-danger"><b>Sede Central</b></span> <span class="badge rounded-pill bg-info"><b>Sede Central</b></span> </small></p>
                    <a href="#" class="btn btn-sm text-light colorRojo bottom-0">Ver detalles</a>
                     <a href="#" class="btn btn-sm text-light colorRojo disabled bottom-0">No ofertado</a>
                     
                </div>
            </div>
        </div> 
    </div>    <div class="titulohr mb-4"></div>
      <div class="card sinBordes mb-4 ">
        <div class="row">
            <div class="col col-lg-5 col-sm-12 col-12 h-100">
                <img  src="{{asset('img/oferta/IMG_9601.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col col-lg-7 col-sm-12 col-12 ">
                <div class="card-block px-4">
                    <h2 class="card-title textoSuavecito mb-0 mt-2 ">Maestria en</h2>
                    <h1 class="textoDuro textoGris mt-0"><p class="card-text"><span class="bordeBajo">Ejemplo maestria</span></p></h1>
                    <p><b>Descripción:</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                    <h4 class="card-title textoSuavecito mb-0">Titulo a obtener</h4>
                    <h3 class="card-title textoSuavecito mb-0"><b>Maestro en @maestria</b></h3>
                    <p class="card-text "><small >Ofertado desde:<b>Martes 31 de agosto de 2021</b> </small></p>
                    <a href="#" class="btn btn-sm text-light colorRojo bottom-0">Ver detalles</a>
                </div>
            </div>
        </div> 
    </div>   
     
</div>


@endsection
