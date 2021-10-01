@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')
<div class="colorGris text-center py-4  imagenAtras">
   <div class="col-9 mx-auto ">
            <div class="row ">
                <div class="col-5">     
                    <ul class="list-unstyled mb-0 pt-3 text-white font-weight-light">
                        <li class="lh-sm"><span class="fontInicio pt-3 pe-4"><b>Estudia tu</b><span></li>
                        <li class="lh-sm  fontInicio"><b>Posgrado en la</b></li>
                        <li class="lh-sm  fontInicio"><b>UES</b></li>
                        <li class="lh-sm  paddingBotonInicio  pb-3">Pequeña descripcion.</li>
                    </ul>
                    <button type="button" class=" btn btn-danger mt-1 text-light text-start ms-4">Ver más</button>
                </div>
                <div class="col-4 offset-3 ">
                    <img src="{{asset('img/quimicaRedondo.png')}}"  class="img-fluid" max-width="300">
                </div>
             </div>
        </div>
</div>
<div class=" negativoBanner bg-light pt-2 bannerAdelante">
@include('publico.cabecera',['titulo' => 'Oferta Academica','descripcion'=>'Oferta academica por facultades.'])
</div>
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
@endsection