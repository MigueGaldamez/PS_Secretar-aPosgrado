@extends('layouts.frontend',['subtitulo' => 'Reseña'])

@section('content')
@include('publico.cabecera',['titulo' => 'Reseña Historica','descripcion'=>'y la Universidad de El Salvador'])

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
                    <h5 ><span class="fondoNegroT py-1 px-3">First slide label</span></h5>
                    <p ><span class="fondoNegroT py-1 px-3">Some representative placeholder content for the first slide.</span> </p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/ANTIGUOS.S3-.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 ><span class="fondoNegroT py-1 px-3">First slide label</span></h5>
                    <p ><span class="fondoNegroT py-1 px-3">Some representative placeholder content for the first slide.</span> </p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                     <h5 ><span class="fondoNegroT py-1 px-3">First slide label</span></h5>
                    <p ><span class="fondoNegroT py-1 px-3">Some representative placeholder content for the first slide.</span> </p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon fondoNegroT px-4 py-4" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon fondoNegroT px-4 py-4" aria-hidden="true"></span>
                <span class="visually-hidden ">Next</span>
            </button>
        </div>
    {{--Fin carousel--}}
   
    </div>
</div>

  <div class="container col-12 mt-4 mb-4">
         {{--inicio cards--}}
        <div class="row">
            <div class="col historia">
                <h3 class="textoDuro  lh-sm "><b>Acerca de la Universidad de El Salvador UES</b></h3>
                <h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>
                <p class="has-dropcap textoSuavecito2 parrafo">La Universidad de El Salvador (UES) es la única universidad pública de
                    El Salvador, además de ser la más grande del país fue la primera que
                    se fundó en territorio salvadoreño.
                    Por decreto de la Asamblea Legislativa la UES, se creó el 16 de febrero
                    de 1841; más tarde en <b>1843</b> inició sus actividades impartiendo
                    matemáticas puras, lógica, moral, metafísica y física general.
                  

                   </p>
            </div>
            <div class="col historia">
                <h3 class="textoDuro  lh-sm"><b>Secretaría de Posgrado</b></h3>
                <h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>
                <p class="has-dropcap textoSuavecito2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
             
        </div>
        
</div>
{{--INICIO--}}
<div class="parallax my-4" style="background-image: linear-gradient(black, black),url('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Escuela_de_Filosof%C3%ADa%2C_Facultad_de_Ciencias_y_Humanidades_%28UES%29.jpg/1200px-Escuela_de_Filosof%C3%ADa%2C_Facultad_de_Ciencias_y_Humanidades_%28UES%29.jpg'); background-blend-mode: saturation;">
<div class="fechas mb-4 mt-4"> 
    
   <div class="entries">
  @foreach ($resenias as $fecha)
        @if ($fecha->importancia==1)
          <div class="entry box box-down red bg-dark text-light">
            <div class="title text-light">{{$fecha->anio}}</div>
            <div class="body text-light">
              <p> {{$fecha->descripcion}}.</p>
            </div>
          </div>
        
        @elseif ($fecha->importancia==2)
            
          <div class="entry box box-down red card">
            <div class="title big">{{$fecha->anio}}</div>
            <div class="body">
               <p> {{$fecha->descripcion}}.</p>
            </div>
          </div>
        @endif
  @endforeach
  </div>
</div>
</div>

{{--FIN--}}
@endsection
