@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')
<div class="colorGris text-center py-4 imagenAtras">
    <div class="col-10 mx-auto ">
        <div class="row ">
            <div class="col col-sm-12 col-12 col-md-7 col-lg-6">     
                <ul class="list-unstyled mb-0 pt-3 text-white font-weight-light text-start pe-0">
                    <li class="lh-sm  fontInicio "><b>Estudia tu</b></li>
                    <li class="lh-sm  fontInicio "><b>Posgrado en la UES</b></li>
                </ul>
                 <ul class="list-unstyled mb-0 pt-3 text-white font-weight-light text-start pe-0">
                  
                    <li class="lh-sm  paddingBotonInicio  pb-3 fondoRojizo">Animate a la experiencia UES</li>
                </ul>
            </div>
            <div class="col-4  offset-lg-2 d-none d-md-block position-relative">
                <img src="{{asset('img/capauno.png')}}"  class="img-fluid bottom-0" max-width="300">
            </div>
        </div>
    </div>
</div>
<div class="bg-light negativoBanner sinBordes pt-2 bannerAdelante">
@include('publico.cabecera',['titulo' => 'Oferta Académica','descripcion'=>''])
</div>
<div class="colorGris text-center py-4 mt-4">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Titulo Información</h1>
    <h5 class="text-light textoSuavecito">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h5>
</div>
<div class="container mt-4">
    <div class="row">
        @foreach ($facultadesF as $item)
        <div class="col col-lg-4 col-sm-12 mb-4 col-12 col-md-6">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{$item->urlImagen}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">{{$item->nombre}}</span></h5>
                    <a class="btn btn-danger text-white botonCardFacu" href="{{route('ofertaFacultad',$item->id)}}">Ver mas</a>
                </div>
            </div>
            <p class="textoFacu"><span >{{$item->descripcion}}</span></p>
        </div>
       
        @endforeach
    </div>
</div>
<div class="colorGris text-center py-4 ">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Sedes de nuestra Universidad</h1>
    <h5 class="text-light textoSuavecito">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h5>
</div>
<div class="container mt-4">
    <div class="row">
        @foreach ($facultadesS as $item)
        <div class="col col-lg-4 col-sm-12 mb-4 col-12 col-md-6">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{$item->urlImagen}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">{{$item->nombre}}</span></h5>
                    <a class="btn btn-danger text-white botonCardFacu" href="{{route('ofertaFacultad',$item->id)}}">Ver mas</a>
                </div>
            </div>
            <p class="textoFacu"><span >{{$item->descripcion}}</span></p>
        </div>
       
        @endforeach
    </div>
</div>
@endsection
