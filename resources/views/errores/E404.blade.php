@extends('layouts.backend',['titulo' => 'No permiso'])

@section('content')
    <div class="container">
        <div class="prohibido">          
            <div class="lock"></div>
            <div class="message text-center">
                <h1>Acceso denegado</h1>
                <p>Favor contactar a un administrador si considera que este es un error.</p>
            </div>
        </div>
    </div>
@endsection
