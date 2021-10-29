@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="card border-info">
                    <div class="card-body">
                        <h5 class="card-title">Información de la Secretaría</h5>
                        <p class="card-text">Sección donde se puede editar el logo, y demas informacion de la entidad.</p>
                        <a href="{{ route('Informacion') }}" class="btn btn-primary">Click para Ir
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  mb-3">
                <div class="card border-info">
                    <div class="card-body">
                        <h5 class="card-title">Facultades</h5>
                        <p class="card-text">Sección donde se puede editar la informacion de las Facultades</p>
                        <a href="{{ route('Facultades') }}" class="btn btn-primary">Click para Ir
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  mb-3">
                <div class="card border-info">
                    <div class="card-body">
                        <h5 class="card-title">Enlaces</h5>
                        <p class="card-text">Sección donde se agrega enlaces importantes de la Universidad de El Salvador</p>
                        <a href="{{ route('Enlaces') }}" class="btn btn-primary">Click para Ir
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  mb-3">
                <div class="card border-info">
                    <div class="card-body">
                        <h5 class="card-title">Opciones</h5>
                        <p class="card-text">Sección donde se gestiona las opciones de modalidades, tipos de duración y tipos de prograna</p>
                        <a href="{{ route('Modalidades') }}" class="btn btn-primary">Modalidades
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </a>
                        <a href="{{ route('TipoDuracions') }}" class="btn btn-primary">Tipos de duración
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </a>
                        <a href="{{ route('TipoProgramas') }}" class="btn btn-primary">Tipos de programa
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
