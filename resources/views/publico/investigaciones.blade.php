@extends('layouts.frontend',['subtitulo' => 'Investigaciones'])

@section('content')

@include('publico.cabecera',['titulo' => 'Investigaciones','descripcion'=>''])

<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{asset('img/enlaces/uno.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-12">
            {{--Inicio buscar--}}
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="" class="col-form-label">Busqueda</label>
                </div>
                <div class="col">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <span id="" class="form-text">
                <button type="button" class="btn btn-secondary colorGris">Buscar</button>
                    </span>
                    <span id="" class="form-text">
                <button type="button" class="btn btn-secondary colorGris">Filtrar por</button>
                    </span>
                </div>
            </div>
            {{--Fin buscar--}}
        </div>
    </div>
    <div class="row my-4">
        <div class="card-containerR mb-4">
            <div class="float-layoutR">
                <div class="card-imageR">
                <img src="{{asset('img/facultades/seis.jpg')}}">
                    <div class="cardR">
                        <h2><b>Lorem ipsum dolor sit amet.</b></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        <div class="row">
                            <div class="col">
                                <a href="" class=""><p class="card-text"><small class="text-muted">Descargar </small></p></a>
                            </div>
                            <div class="col">
                                <p class="card-text text-end"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></p>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
        <div class="card-containerL">
            <div class="float-layoutL">
                <div class="card-imageL">
               
                    <div class="cardL">
                        <h2><b>Lorem ipsum dolor sit amet.</b></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        <div class="row">
                            <div class="col">
                                <p class="card-text"><small class="text-muted">Descargar </small></p>
                            </div>
                            <div class="col">
                                <p class="card-text text-end"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></p>
                            </div>
                        </div>
                    </div>
                     <img src="{{asset('img/facultades/tres.jpg')}}">
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div>
@endsection 
