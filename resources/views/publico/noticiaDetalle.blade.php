@extends('layouts.frontend',['subtitulo' => 'Enlaces'])

@section('content')

@include('publico.cabecera',['titulo' => "Noticia",'descripcion'=>''])
<div class="container">
    <div class="row">
        <div class="col">       
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-8 pe-md-5 overflow-hidden mt-4">
        <div class="titulohr mb-4"></div>
            <h2 class="textoGris text-dark">{{$noticia->titulo}}</h2>

            
            
            <p class="card-text "><small class="text-muted">Publicado: </small><b>{{$noticia->created_at}}</b></p>
               <div class="mb-5 noticiaImagen"> {!!$noticia->cuerpo!!}</div>   
        </div>
        <div class="col-lg-4 mt-4 pe-md-0">
            <h2 class="text-dark mb-0 ps-0   ">Más Destacadas</h2>   
            <div class="titulohr mb-4"></div>
            @foreach ($noticias as $item)
            <div class="card mb-3  p-2">
                <div class="row g-0">
                   <div class="col-12 text-center">
                    <img src="{{asset($item->urlImagen)}}" class="img-fluid fullAlto imagenNotiDestaDet" alt="...">
                    </div>
                    <div class="col-12">
                    <div class="card-body  paddinNoticias ps-2">
                        <b><a href="{{route('noticia',['slug'=>$item->slug])}}" class="text-dark"><h5 class="card-title">{{$item->titulo}}</h5></a></b>
                        
                        <p class="card-text"><small class="">Publicado <b>{{$item->created_at}}</b></small></p>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach    
        </div>
    </div>
</div>
@endsection
