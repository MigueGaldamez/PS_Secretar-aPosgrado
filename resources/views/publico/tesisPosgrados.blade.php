@extends('layouts.frontend',['subtitulo' => 'Órganos de gobierno'])

@section('content')

@include('publico.cabecera',['titulo' => 'Tesis Posgrados','descripcion'=>'De las 12 facultades de la Universidad'])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Consultar  Tesis por Posgrados</span></h3>
</div>

<posgrado-Facultad/>    
@endsection
