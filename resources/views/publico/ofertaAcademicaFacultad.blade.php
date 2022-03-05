@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')



@include('publico.cabecera',['titulo' => 'Oferta Académica','descripcion'=>'Oferta académica en la Facultad'])
  <oferta-Facultad :facultad='{{json_encode($facultad)}}'></oferta-Facultad>




@endsection
