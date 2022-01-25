@extends('layouts.frontend',['subtitulo' => 'Noticias'])

@section('content')

@include('publico.cabecera',['titulo' => 'Noticias','descripcion'=>''])
<div class="container pb-4">
     <div class="row mb-4">
        <div class="col">
            <img src="{{asset('img/banners/IMG_1194.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
            {{--Inicio buscar--}}
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
            {{--Fin buscar--}}

    
    <div class="row">
        {{--Inicio noticias--}}
        <div class="col-lg-7 mt-4">
            <noticias-component></noticias-component>
        </div>
        <div class="col-lg-4 mt-4 offset-lg-1">
            <h2 class="text-dark mb-0 ps-0   ">Más Destacadas</h2>   
            <div class="titulohr mb-4"></div>
            @foreach ($noticias as $item)
            <div class="card mb-3 sinBordes ">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="{{asset($item->urlImagen)}}" class="img-fluid fullAlto" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body  paddinNoticias ps-2">
                        <b><a href="{{route('noticia',['slug'=>$item->slug])}}" class="text-dark"><h5 class="card-title">{{$item->titulo}}</h5></a></b>
                        
                    <p class="card-text"><small class="text-muted">Publicado </small><b>{{$item->created_at}}</b></p>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach    
        </div>
    </div>
</div>

@endsection
