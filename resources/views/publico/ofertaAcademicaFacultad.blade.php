@extends('layouts.frontend',['subtitulo' => 'Oferta'])

@section('content')



@include('publico.cabecera',['titulo' => 'Oferta Academica','descripcion'=>'Oferta academica en la Facultad de Humanidades.'])

<div class="colorGris text-center py-4 mt-4"  style="background-color:{{$facultad->color}} !important; ">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">{{$facultad->nombre}}</h1>
    <h5 class="text-light textoSuavecito">Aquí se muestran los posgrados de la facultad, tanto los ofertados como los no ofertados. </h5>
</div>
<div class="container-fluid ps-0 mt-4  mb-4">  
    @foreach ($facultad->posgrados as $posgrado)
        <div class="card sinBordes mb-4 ">
            <div class="row">
                <div class="col col-lg-4 col-sm-12 col-12">
               
                    <img  src="{{$posgrado->imagen}}" class="img-thumbnail" alt="">
                </div>
                <div class="col col-lg-8 col-sm-12 col-12 ">
                    <div class="card-block px-4">
                    
                        
                        {{--<h2 class="card-title textoSuavecito mb-0">{{$posgrado->nombre}}</h2>--}}
                        
                    
                        <h1 class="card-title textoSuavecito mb-2"><p class="card-text"><span class="bordeBajo">{{$posgrado->nombre}}</span></p></h1>
                        <p><b>Descripción:</b><br>{{$posgrado->descripcion}}
                        </p>
                        <h4 class="card-title textoSuavecito mb-0">Titulo a otorgar:</h4>
                        <h3 class="card-title textoSuavecito mb-0"><b>{{$posgrado->titulo}}</b></h3>
                        
                        <small >Ofertado en: </small>
                        <div class="wrapper-tol">
                        
                            <input type="checkbox" />
                            
                                <h5><span class="badge btn rounded-pill" style="background-color:{{$posgrado->facultad->color}} !important;">Ver datos de contacto</span>
                            </h5>
                            <div class="tooltip">
                                <b> {{$posgrado->facultad->contactoPosgrado}}
                               </b>
                            </div>
                        </div>
                      
                        @if ($posgrado->ofertado)
                                  <a href="#" class="btn btn-sm text-light colorRojo bottom-0">Ver detalles</a>
                        @else
                             <a href="#" class="btn btn-sm text-light colorRojo disabled bottom-0">No ofertado</a>
                        @endif
                        
                       
                        
                    </div>
                </div>
            </div> 
        </div>
    <div class="titulohr mb-4"></div>
    @endforeach
    
    
      
     
</div>


@endsection
