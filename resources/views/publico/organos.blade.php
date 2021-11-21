@extends('layouts.frontend',['subtitulo' => 'Órganos de gobierno'])

@section('content')

@include('publico.cabecera',['titulo' => 'Órganos de gobierno','descripcion'=>''])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Órganos de gobierno de la Universidad de El Salvador</span></h3>
</div>
<div class="container"> 
        <div class="row my-3 my-sm-3 my-lg-1 my-md-1">
            <div class=" callout callout-danger col col-lg-3 col-md-3 col-sm-11 col-11 row mx-4 my-1 my-md-3  my-lg-4">
                <div class="col col-8 ">
                
                    <a href=""><span><b>Rectoria.</b></span></a>
                    <br>
                <span>Texto de prueba</span>
                        
                </div>
                <div class="col col-4  logosMarginMenos">
                <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="90">
                    
                </div>
            </div>
           
            <div class=" callout callout-danger col col-lg-3 col-md-3 col-sm-11 col-11 row mx-4 my-1  my-md-3  my-lg-4">
                <div class="col col-8 ">
                
                    <a href=""><span><b>Asamblea General Universitaria.</b></span></a>
                    <br>
                    <span>Texto de prueba</span>
                        
                </div>
                <div class="col col-4  logosMarginMenos">
                    <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="100">
                    
                </div>
            </div>
             <div class=" callout callout-danger col col-lg-3 col-md-3 col-sm-11 col-11 row mx-4 my-1  my-md-3  my-lg-4">
                <div class="col col-8 ">
                
                    <a href=""><span><b>Consejo Superior Universitario.</b></span></a>
                    <br>
                    <span>Texto de prueba</span>
                        
                </div>
                <div class="col col-4  logosMarginMenos">
                    <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="100">
                    
                </div>
            </div>
        
    </div>
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
