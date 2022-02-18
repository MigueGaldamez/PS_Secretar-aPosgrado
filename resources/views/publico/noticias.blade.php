@extends('layouts.frontend',['subtitulo' => 'Noticias'])

@section('content')

@include('publico.cabecera',['titulo' => 'Noticias','descripcion'=>'Toda la actualidad de Posgrados UES aquí'])
<div class="container pb-4">
  {{--
     <div class="row mb-4">
        <div class="col">
            <img src="{{asset('img/banners/IMG_1194.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
          Inicio buscar
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                      <h2 class="text-dark mb-0 ps-0">Busqueda</h2>   
                </div>
                <div class="col">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <span id="" class="form-text">
                    <button type="button" class="btn btn-secondary colorGris">Buscar</button>
                    </span>
                </div>
            </div>
            Fin buscar--}}

    
    <div class="row">
        {{--Inicio noticias--}}
        <div class="col-lg-8 mt-4 pe-md-5">
            <noticias-component></noticias-component>
        </div>
        <div class="col-lg-4 mt-4 pe-md-0">
            <h2 class="text-dark mb-0 ps-0 textoGris  ">Galeria de Posgrados</h2>  
            <div class="titulohr mb-4"></div>
            @foreach ($galeria as $item)
            <div class="card mb-3 p-2">
                <div class="row g-0">
                    <div class="col-12 text-center">
                    <img src="{{asset($item->urlImagen)}}" class="img-fluid fullAlto imagenNotiDestaDet" alt="...">
                    </div>
                    <div class="col-12">
                    <div class="card-body  paddinNoticias ps-2">
                    <b><a class="text-dark"><h5 class="card-title">{{$item->titulo}}</h5></a></b>
                        
                    <span class="card-text"><small class=""> <b>{{$item->subtitulo}}</b></small></span>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach    
        </div>
        
    </div>
</div>

@endsection
