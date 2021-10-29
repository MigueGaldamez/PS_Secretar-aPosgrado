@extends('layouts.backend',['titulo' => 'Facultades'])

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header text-center">
            <h3> Facultades de la Universidad de El Salvador</h3>
        </div>
        <div class="card-body">
            <facultades-component/>
        </div>
        <div class="card-footer text-muted text-center"></div>
    </div>
</div>
@endsection
