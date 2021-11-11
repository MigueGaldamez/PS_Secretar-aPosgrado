@extends('layouts.frontend',['subtitulo' => 'Investigaciones'])

@section('content')

@include('publico.cabecera',['titulo' => 'Investigaciones','descripcion'=>''])

<div class="container mb-4">
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
</div>

    <opciones-Facultades>
    </opciones-Facultades>
  
<div class="container">  
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
