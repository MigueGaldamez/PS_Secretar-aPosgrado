@extends('layouts.backend',['titulo' => 'Noticias'])

@section('content')
    <div class="container">
        <h1> Gestion de las Noticias</h1>
        <noticias-component/>
    </div>
    <div id="summernote"><p>Hello Summernote</p></div>
@endsection
