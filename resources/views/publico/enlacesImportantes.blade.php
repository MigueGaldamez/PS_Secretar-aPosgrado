@extends('layouts.frontend',['subtitulo' => 'Enlaces'])

@section('content')

@include('publico.cabecera',['titulo' => 'Enlaces importantes','descripcion'=>'Otras secretarías'])
<div class="container">
     <div class="row">
        <div class="col">
            <img src="{{asset('img/banners/IMG_1201.jpg')}}"  alt="..." class="bannerLink">
        </div>

    </div>
</div>
<div class="container-fluid col-11">
   
    <div class="row mt-4">
     
        <div class="col col-12 col-lg-9">
            <h3 class="textoGris  textoDuro">Secretarías, repositorios, portales y más.</h3>
            <div class="titulohr"></div>
            <div class="row mb-4">
                @foreach ($enlaces as $enlace)
                <div class="col col-12 col-md-4 mt-4">
                    <div class="card enlaceItem"><img class="card__img" src="{{$enlace->urlImagen}}" alt="Canyons">
                        <div class="card__content">
                            <a  class="text-dark text-decoration-none" href="{{$enlace->link}}" target="_blank"  ><h5 class="">{{$enlace->titulo}}</h5></a>
                            <a class="card__btn" href="{{$enlace->link}}" target="_blank" >Visitar<span>&rarr;</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
  
            {{--
            @foreach ($enlaces as $enlace)
                <div class=" callout callout-danger row">
                    <div class="col col-12 col-lg-8 ">
                    
                        <a href="{{$enlace->link}}"><span><b>{{$enlace->titulo}}</b></span><br></a>
                        <br><a href="{{$enlace->link}}" class="">Visitar</a>
                    </div>
                    <div class="col col-12 col-lg-4 my-n3">
                        <img src="{{$enlace->urlImagen}}" alt="" height="150" class="pe-0">
                    
                    </div>
                </div>
            @endforeach
                --}}
        
         
           
        </div>
        <div class="col col-lg-3  col-12">
          <h3 class="textoGris  textoDuro">Enlaces más visitados</h3>
            <div class="titulohr"></div>
         
            @php
                $contador=0;
            @endphp
            
            @foreach ($enlacesMas as $enlace)
                
                @if ($contador%2==0)
                    <div class=" calloutIL calloutIL-info row card">                       
                        <a href="{{$enlace->link}}" class="text-secondary" target="_blank" ><span><b>{{$enlace->titulo}}</b></span></a>
                    </div>
                @elseif ($contador%2!=0)
                    <div class=" calloutIR calloutIR-info row card">                  
                        <a href="{{$enlace->link}}" class="text-dark" target="_blank" ><span><b>{{$enlace->titulo}}</b></span></a>
                    </div>
                @endif
                @php
                    $contador++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
@endsection
