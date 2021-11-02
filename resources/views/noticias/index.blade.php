@extends('layouts.backend',['titulo' => 'Reseña historica'])

@section('content')
<div class="container">
    <div class="card shadow-lg ">
        <ul class="list-group list-group-flush text-center">
            <li class="list-group-item"><h3> Gestion de las Noticias</h3></li>
        </ul>
       
        <div class="card-body px-4">
            <noticias-component/>
        </div>
        <div class="text-muted text-center mb-2">{{date('Y-m-d')}}</div>
    </div>
</div>
@endsection
