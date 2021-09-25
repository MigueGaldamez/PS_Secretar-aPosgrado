@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')

@include('publico.cabecera',['titulo' => 'Oferta Academica','descripcion'=>'Oferta academica por facultades.'])

<div class="colorGris text-center py-4 mt-4">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Titulo Información</h1>
    <h5 class="text-light textoSuavecito">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h5>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{asset('img/facultades/una.jpg')}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">Ciencias y Humanidades</span></h5>
                  <button type="button" class="btn btn-danger text-white botonCardFacu">Ver mas</button>
                </div>
            </div>
            <p class="textoFacu"><span >Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span></p>
        </div>
         <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{asset('img/facultades/dos.jpg')}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">Ciencias y Humanidades</span></h5>
                  <button type="button" class="btn btn-danger text-white botonCardFacu">Ver mas</button>
                </div>
            </div>
            <p class="textoFacu"><span >Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span></p>
        </div>
         <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{asset('img/facultades/tres.jpg')}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">Ciencias y Humanidades</span></h5>
                  <button type="button" class="btn btn-danger text-white botonCardFacu">Ver mas</button>
                </div>
            </div>
            <p class="textoFacu"><span >Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span></p>
        </div>
         <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{asset('img/facultades/cuatro.jpg')}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">Ciencias y Humanidades</span></h5>
                  <button type="button" class="btn btn-danger text-white botonCardFacu">Ver mas</button>
                </div>
            </div>
            <p class="textoFacu"><span >Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span></p>
        </div>
       
    </div>
</div>
<div class="colorGris text-center py-4 ">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Sedes de nuestra Universidad</h1>
    <h5 class="text-light textoSuavecito">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h5>
</div>

@endsection
