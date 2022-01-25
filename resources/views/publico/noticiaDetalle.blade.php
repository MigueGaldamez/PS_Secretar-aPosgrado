@extends('layouts.frontend',['subtitulo' => 'Enlaces'])

@section('content')

@include('publico.cabecera',['titulo' => "$noticia->titulo",'descripcion'=>''])
<div class="container">
    <div class="row">
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-7">
            <h2 class="textoGris mb-0 ps-0 mt-4">Contenido</h2>
            <div class="titulohr mb-4"></div>
            
            <p class="card-text"><small class="text-muted">Publicado: </small><b>{{$noticia->created_at}}</b></p>
                {!!$noticia->cuerpo!!}   
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
