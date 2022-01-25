@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')



@include('publico.cabecera',['titulo' => 'Oferta Academica','descripcion'=>'Oferta academica en la Facultad'])
  <oferta-Facultad :facultad='{{json_encode($facultad)}}'></oferta-Facultad>




@endsection
