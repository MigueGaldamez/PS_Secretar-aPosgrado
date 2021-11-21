@extends('layouts.frontend',['subtitulo' => 'Investigaciones'])

@section('content')

@include('publico.cabecera',['titulo' => 'Investigaciones','descripcion'=>''])

<div class="container mb-4">
    <div class="row">
        <div class="col">
            <img src="{{asset('img/enlaces/uno.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-12">
            {{--Inicio buscar--}}
            <h3><span>Filtrado Por Facultad y posgrado<span></h3>
             <div class="titulohr mb-2"></div>
            {{--Fin buscar--}}
        </div>
    </div>
</div>

    <opciones-Facultades>
    </opciones-Facultades>
  
@endsection 
