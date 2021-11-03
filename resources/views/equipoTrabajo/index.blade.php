@extends('layouts.backend',['titulo' => 'Equipo de Trabajo'])

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header text-center">
            <h3> Equipos de trabajo de la Secretraría de Posgrados</h3>
        </div>
        <div class="card-body">
            <equipo-trabajo-component/>
        </div>
        <div class="card-footer text-muted text-center"></div>
    </div>
</div>
@endsection
