@extends('layouts.frontend',['subtitulo' => 'Órganos de gobierno'])

@section('content')

@include('publico.cabecera',['titulo' => 'Órganos de gobierno','descripcion'=>''])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Consultar los las Tesis por Posgrados</span></h3>
</div>

<posgrado-Facultad/>    
@endsection
