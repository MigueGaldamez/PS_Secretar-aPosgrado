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
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 ><span class="fondoNegroT py-1 px-3">First slide label</span></h5>
                    <p ><span class="fondoNegroT py-1 px-3">Some representative placeholder content for the first slide.</span> </p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/ANTIGUOS.S3-.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 ><span class="fondoNegroT py-1 px-3">First slide label</span></h5>
                    <p ><span class="fondoNegroT py-1 px-3">Some representative placeholder content for the first slide.</span> </p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100" alt="...">
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
                <span class="visually-hidden">Next</span>
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
                {{--<h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>--}}
                <p class="has-dropcap textoSuavecito2 parrafo"> A lo largo de su existencia la Universidad de El Salvador ha sido testigo y protagonista de importantes cambios políticos y sociales del país, ha superado daños en infraestructuras causados por terremotos, ocupaciones militares que prolongaron el cierre del campus en varias ocasiones, represión y persecución política de sus estudiantes y trabajadores en un contexto de guerra civil.
Actualmente, la UES ha logrado ampliar la oferta académica de Posgrado: 79 carreras en modalidad presencial y 7 a distancia; 71 maestrías, 9 doctorados, 27 especialidades médicas y 44 diplomados como parte de la educación continua.

                  

                   </p>
            </div>
            <div class="col historia">
                <h3 class="textoDuro  lh-sm"><b>Secretaría de Posgrado</b></h3>
                {{--<h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>--}}
                <p class="has-dropcap textoSuavecito2">La Secretaría de Posgrado de la Universidad de El Salvador es una dependencia administrativa de la Vicerrectoría Académica, cuya finalidad principal es contribuir al fortalecimiento del sistema de posgrado y atender las necesidades de formación y educación avanzada en la UES.
Coordina y promueve las actividades académicas y administrativas del Sistema de Estudios de Posgrados (SEP) encaminadas hacia la excelencia académica, también, ejecuta políticas que rigen los sistemas de Estudio de posgrado.
</p>
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
