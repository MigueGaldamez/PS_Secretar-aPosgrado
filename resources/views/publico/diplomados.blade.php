@extends('layouts.frontend',['subtitulo' => 'Diplomados '])

@section('content')

@include('publico.cabecera',['titulo' => 'Diplomados','descripcion'=>'de la Universidad de El Salvador'])

<div class="bg-dark text-center py-4 mt-4">
    <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">Programas de Educación Continua UES</h1>
    <h5 class="text-light textoSuavecito">A través de nuestros diplomados y cursos de educación continua, la UES te ofrece oportunidades para seguir tu formación académica en una gran variedad de campos de conocimiento, adquiriendo más habilidades y competencias que te otorgará las herramientas necesarias para tener un mejor desempeño profesional. </h5>
</div>
<div class="container mt-4 mb-4">    
    <div class="accordion" id="accordionExample">        
        @foreach ($facultades as $facultad)
        
        @if (!$facultad->diplomados->isEmpty())   
        <div>
            <h2>
                <a class="text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#facultad-{{$facultad->id}}" aria-expanded="false" aria-controls="collapseOne">
                   <h2 class="textoGris textoSuavecito2">{{$facultad->nombre}}</h2>
                    <div class="titulohr"></div>
                </a>
            </h2>
            <div id="facultad-{{$facultad->id}}" class="accordion-collapse collapse nolist" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body pt-0 mt-0">            
                     <table class="table table-striped  table-borderless text-center">
                        <thead class="tableGris">
                            <tr>
                            <th scope="col">Nombre Diplomado</th>
                            <th scope="col">Duración</th>
                            <th scope="col">Modalidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($facultad->diplomados as $diplomado)
                            <tr>    
                                <td>{{$diplomado->nombre}}</td>
                                <td>
                                    @if(!$diplomado->duracion==0)
                                        {{$diplomado->duracion}} {{$diplomado->tipo_duracion->nombre}}                  
                                    @else
                                        {{$diplomado->tipo_duracion->nombre}}
                                    @endif
                                </td>
                                <td>                                 
                                    <span class="badge badge-pill {{$diplomado->modalidad->clase}}">{{$diplomado->modalidad->nombre}}</span>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="table-success table-active"><p class="fs-4 fw-bolder">{{$facultad->contactoDiplomado}}</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
