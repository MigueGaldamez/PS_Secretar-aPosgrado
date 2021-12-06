@extends('layouts.frontend',['subtitulo' => 'Órganos de gobierno'])

@section('content')

@include('publico.cabecera',['titulo' => 'Órganos de gobierno','descripcion'=>''])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Órganos de gobierno de la Universidad de El Salvador</span></h3>
</div>
<div class="container"> 
        <div class="row my-3 my-sm-3 my-lg-1 my-md-1">
           
           
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12  my-1  my-md-5  my-lg-4">
                <div class=" callout callout-danger row shadow-lg">
                    <div class="col col-9 ">
                    
                        <a href="https://www.agu.ues.edu.sv/" target="_blank"><span><b>Asamblea General Universitaria.</b></span></a>
                        <br>
                        <span>Es el máximo organismo normativo y elector de la universidad; es, además, el órgano supremo para la interpretación de sus fines y la conservación de sus instituciones, todo dentro del marco de las atribuciones que la Ley Organiza de la Universidad de El Salvador determina (artículo 16, Ley Orgánica de la Universidad de El Salvador).</span>
                            
                    </div>
                    <div class="col col-3  logosMarginMenos">
                        <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="100">
                        
                    </div>
                </div>
            </div>
             <div class="col col-lg-6 col-md-6 col-sm-12 col-12  my-1  my-md-5  my-lg-4">
                <div class=" callout callout-danger row shadow-lg">
                    <div class="col col-9 ">
                    
                        <a href="https://acsu.ues.edu.sv/rps/" target="_blank"><span><b>Consejo Superior Universitario.</b></span></a>
                        <br>
                        <span>Es el máximo organismo en las funciones administrativas, docente, técnica y disciplinaria de la universidad; al efecto, dictará las resoluciones pertinentes para el cumplimiento de las disposiciones de esta ley y los reglamentos universitarios correspondientes.</span>
                            
                    </div>
                    <div class="col col-3  logosMarginMenos">
                        <img class="" src="{{asset('img/organos/acsuweb.jpg')}}" alt="" height="100">
                        
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div class="colorGris mt-2 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Autoridades Centrales Periodos 2019-2023 </span></h3>
</div>
<div class="container mt-2">
    <div class="row"> 
        <div class="col-6 mx-auto">
            <div class="card mb-3 recuadro">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="{{asset('img/organos/rector.jpg')}}" class="img-fluid rounded-start h-100" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Msc. Roger Armando Arias</h5>
                        <h6 class="card-title text-muted">Rector de la Universidad de El Salvador</h6>
                        <p class="card-text">Máximo funcionario ejecutivo de la Universidad y tiene a su cargo la representación legal de la Universidad de El Salvador. Ejecuta y hace cumplir las resoluciones de la Asamblea General Universitaria y del Consejo Superior Universitario</p>
                        <p class="card-text"><small class="text-muted">Periodo 2019-2023</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-6">
            <div class="card mb-3 recuadro">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="{{asset('img/organos/vicerrector académico.jpg')}}" class="img-fluid rounded-start h-100" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">PhD. Raúl Ernesto Azcúnaga López</h5>
                        <h6 class="card-title text-muted">Vicerrector Académico de la Universidad de El Salvador</h6>
                        <p class="card-text">Coordinar y supervisar las funciones académicas, en conjunto con las autoridades de las Facultades.</p>
                        <p class="card-text"><small class="text-muted">Periodo 2019-2023</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3 recuadro">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="{{asset('img/organos/vicerrector administrativo.jpg')}}" class="img-fluid rounded-start h-100" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Ing. Juan Rosa Quintanilla</h5>
                        <h6 class="card-title text-muted">Vicerrector Administrativo de la Universidad de El Salvador</h6>
                        <p class="card-text">Dirige, supervisa y evalúa el sistema administrativo de la Universidad, señalando las pautas para que la administración cumpla sus funciones en forma eficiente y eficaz.</p>
                        <p class="card-text"><small class="text-muted">Periodo 2019-2023</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>
</div>

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Equipo de Trabajo de la Secretaría de Posgrado </span></h3>
</div>
<div class="container mt-2">
    <h2 class="textoGris"><span class="textoSuavecito2">Equipo de Trabajo de la Secretaría de Posgrado</span></h2>
      <div class="titulohr mb-4"></div>
    @php
        $contador = 1;
    @endphp
    @foreach ($equipoTrabajo as $miembro)
        
        @if ($contador%2 ==0)
             <div class="row mb-4"> 
                <div class="col col-lg-9 col-12 col-md-9">
                    <div class="card cardEquipo">
                        <div class="card-body px-4">
                            <h3 class="card-title textoGris">{{$miembro->nombre}}</h3>
                            <div class="divisor"></div>
                            <h6>{{$miembro->cargo}}</h6>
                            
                            <p class="card-text">{{$miembro->descripcion}}</p>
                            {{--<p class="card-text"><small class="text-muted">Numero de contacto: </small></p>--}}
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-12 col-md-3">
                    <img class="img-fluid" src="{{$miembro->urlImagen}}" alt="">
                </div>
                
            </div>
        @else
            <div class="row mb-4">
                <div class="col col-lg-3 col-md-3 col-12">
                    <img class="img-fluid" src="{{$miembro->urlImagen}}" alt="">
                </div>
                <div class="col col-lg-9 col-md-9 col-12">
                    <div class="card cardEquipo">
                        <div class="card-body px-4">
                           <h3 class="card-title textoGris">{{$miembro->nombre}}</h3>
                            <div class="divisor"></div>
                           <h6>{{$miembro->cargo}}</h6>
                            
                            <p class="card-text">{{$miembro->descripcion}}</p>
                            {{--<p class="card-text"><small class="text-muted">Numero de contacto: </small></p>--}}
                            
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @php
            $contador++;
        @endphp
    @endforeach
</div>
@endsection
