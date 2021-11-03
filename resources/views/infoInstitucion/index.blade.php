@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header text-center">
            <h3> Informacion de la Secretaría de Posgrado</h3>
        </div>
        <div class="card-body">
            
            <informacion-component/>
        </div>
        <div class="card-footer text-muted text-center">
          Ultima actualizacion: 25 /05 /2020
        </div>
      </div>
</div>
@endsection
