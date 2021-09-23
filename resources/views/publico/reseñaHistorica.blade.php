@extends('layouts.frontend')

@section('content')
@include('publico.cabecera',['titulo' => 'Reseña Historica','descripcion'=>'De la Universidad de El Salvador'])

<div class="colorGris mt-2">
    <div class="container-fluid col-11" >
    {{--inicio carousel--}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fondoNegroT">First slide label</h5>
                    <p class="fondoNegroT">Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/ANTIGUOS.S3-.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                   <h5 class="fondoNegroT">First slide label</h5>
                    <p class="fondoNegroT">Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="fondoNegroT textoSuavecito">First slide label</h3>
                    <h5 class="fondoNegroT">Some representative placeholder content for the first slide.</h5>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    {{--Fin carousel--}}
   
    </div>
</div>
<div class="container col-9 mt-4 mb-4">
         {{--inicio cards--}}
        <div class="row">
            <div class="col historia">
                <h3 class="textoDuro  lh-sm "><b>Titulo Información</b></h3>
                <h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>
                <p class="textoSuavecito2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
             <div class="col historia">
                <h3 class="textoDuro  lh-sm"><b>Titulo Información</b></h3>
                <h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>
                <p class="textoSuavecito2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
             
        </div>
        {{--FIn cards--}}
</div>

@endsection
