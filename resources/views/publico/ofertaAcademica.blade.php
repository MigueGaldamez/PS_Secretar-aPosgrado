@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')
<div class="colorGris text-center py-4 imagenAtras">
    <div class="col-10 mx-auto ">
        <div class="row ">
            <div class="col col-sm-12 col-12 col-md-7 col-lg-6">            
                <ul class="list-unstyled mb-0 pt-3 text-white font-weight-light text-start pe-0">
                    <li class="lh-sm  fontInicio divConAnimadoN py-3"><span class="slide"><b>Estudia tu <br></span>

                    <span class="slide">Posgrado en la UES</b></span></li>
                </ul>
                 <ul class="list-unstyled mb-0 pt-3 text-white font-weight-light text-start pe-0">
                  
                    <li class="lh-sm  paddingBotonInicio  pb-3 fondoRojizo divConAnimadoR"><span class="slide">Animate a la experiencia UES</span></li>
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
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Facultades Sede Central</h1>
</div>
<div class="container mt-4">
    <div class="row">
        @foreach ($facultadesF as $item)
        <div class="col col-lg-4 col-sm-12 mb-4 col-12 col-md-6">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{$item->urlImagen}}" alt="Card image" style="height:200px">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">{{$item->nombre}}</span></h5>
                    <a class="btn btn-danger text-white botonCardFacu" href="{{route('ofertaFacultad',$item->slug)}}">Ver oferta</a>
                </div>
            </div>
            <p class="textoFacu"><span >{{$item->descripcion}}</span></p>
        </div>
       
        @endforeach
    </div>
</div>
<div class="colorGris text-center py-4 ">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Facultades Multidisciplinarias</h1>
</div>
<div class="container mt-4">
    <div class="row">
        @foreach ($facultadesS as $item)
        <div class="col col-lg-4 col-sm-12 mb-4 col-12 col-md-6">
            <div class="card text-white cardsFacuPad">
                <img class="card-img" src="{{$item->urlImagen}}" alt="Card image" style="height:200px">
                <div class="card-img-overlay">
                    <h5 class="card-title"><span class=" tituloCardFacu text-uppercase">{{$item->nombre}}</span></h5>
                    <a class="btn btn-danger text-white botonCardFacu" href="{{route('ofertaFacultad',$item->slug)}}">Ver mas</a>
                </div>
            </div>
            <p class="textoFacu"><span >{{$item->descripcion}}</span></p>
        </div>
       
        @endforeach
    </div>
</div>
@endsection
