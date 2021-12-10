@extends('layouts.frontend',['subtitulo' => 'Enlaces'])

@section('content')

@include('publico.cabecera',['titulo' => 'Enlaces importantes','descripcion'=>'Otras secretarías'])
<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{asset('img/banners/IMG_1201.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-12 col-lg-8">
                {{--Inicio buscar--}}
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="" class="col-form-label">Busqueda</label>
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
            
            @foreach ($enlaces as $enlace)
                <div class=" callout callout-danger row">
                    <div class="col col-12 col-lg-8 ">
                    
                        <a href="{{$enlace->link}}"><span><b>{{$enlace->titulo}}</b></span><br></a>
                        <br><a href="{{$enlace->link}}" class="">Visitar</a>
                    </div>
                    <div class="col col-12 col-lg-4 my-n3">
                        <img src="{{$enlace->urlImagen}}" alt="" height="150" width="100%" class="pe-0">
                    
                    </div>
                </div>
            @endforeach
                
        
         
           
        </div>
        <div class="col col-lg-4 col-12">
            <h1 class="text-center tituloSuperior text-uppercase bordeBajo"><span>Enlaces mas visitados</span></h1>
            @php
                $contador=0;
            @endphp
            
            @foreach ($enlacesMas as $enlace)
                
                @if ($contador%2==0)
                     <div class=" calloutIL calloutIL-info row">
                        <div class="col">
                            <span><b>{{$enlace->titulo}}</b></span>
                            <br><a href="{{$enlace->link}}" class="">Visitar</a>
                        </div>
                    
                    </div>
                    
                @elseif ($contador%2!=0)
                    <div class=" calloutIR calloutIR-info row">
                        <div class="col">
                            <span><b>{{$enlace->titulo}}</b></span>
                            <br><a href="{{$enlace->link}}" class="">Visitar</a>
                        </div>
                    
                    </div>
                @endif
                @php
                    $contador++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
@endsection
