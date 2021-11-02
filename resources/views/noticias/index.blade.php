@extends('layouts.backend',['titulo' => 'Reseña historica'])

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header text-center">
            <h3> Gestion de las Noticias</h3>
        </div>
        <div class="card-body">
            <noticias-component/>
        </div>
        <div class="card-footer text-muted text-center"></div>
    </div>
</div>
@endsection
