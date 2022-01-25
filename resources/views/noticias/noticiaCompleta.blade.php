@extends('layouts.backend',['titulo' => 'Noticias'])

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="/dashboard/noticias" role="button">Atrás</a>
            <h1>{{$noticia_id->titulo}}</h1>
            {!!$noticia_id->cuerpo!!}
    </div>
@endsection
