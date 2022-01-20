@extends('layouts.backend',['titulo' => 'Noticias'])

@section('content')
    <div class="container">
        <h2>
            <small class="text-muted">Título:</small>
            {{$noticia_id->titulo}}
          </h2>
          <blockquote class="blockquote">
            <p>Detalle de la noticia:</p>
          </blockquote>
          <form  action="{{route('detalleNoticiaGuardar',$noticia_id)}}" method="POST" autocomplete="off">
            @csrf
            @method('put')
            <textarea class="note-codable" id="summernote" name="cuerpo">{{$noticia_id->cuerpo}}</textarea>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        {!!$noticia_id->cuerpo!!}
    </div>
@endsection
