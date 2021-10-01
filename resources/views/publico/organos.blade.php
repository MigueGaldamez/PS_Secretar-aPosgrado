@extends('layouts.frontend',['subtitulo' => 'Órganos de gobierno'])

@section('content')

@include('publico.cabecera',['titulo' => 'Órganos de gobierno','descripcion'=>''])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Administracion que rige a la Universidad de El Salvador</span></h3>
</div>
<div class="container">
   
       
         <div class="row">
           <div class=" callout callout-danger col row mx-4">
            <div class="col col-8 ">
            
                <a href=""><span><b>Consejo Universitario.</b></span></a>
                <br>
                <span>Texto de prueba</span>
                    
            </div>
            <div class="col col-4  logosMarginMenos">
                 <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="100">
                
            </div>
        </div>
        <div class=" callout callout-danger col row mx-4">
            <div class="col col-8 ">
            
                <a href=""><span><b>Consejo Universitario.</b></span></a>
                <br>
                <span>Texto de prueba</span>
                    
            </div>
            <div class="col col-4  logosMarginMenos">
                 <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="100">
                
            </div>
        </div>
        <div class=" callout callout-danger col row mx-4">
            <div class="col col-8 ">
            
                <a href=""><span><b>Rectoria.</b></span></a>
                <br>
               <span>Texto de prueba</span>
                    
            </div>
            <div class="col col-4  logosMarginMenos">
             <img class="" src="{{asset('img/iconos/agu.jpg')}}" alt="" height="90">
                
            </div>
        </div>
    </div>
    <h2 class="textoGris"><span class="textoSuavecito2">Nuestro Equipo de Trabajo</span></h2>
    <div class="row mb-4">
        <div class="col col-lg-3">
            <img class="img-fluid" src="{{asset('img/organos/IMG_6691.jpg')}}" alt="">
        </div>
        <div class="col col-lg-9">
            <div class="card cardEquipo">
                <div class="card-body px-4">
                    <h3 class="card-title textoGris">Mcp. Evelin Patricia Gutiérrez Castro</h3>
                    <div class="divisor"></div>
                    <h6>Coordinadora Secretaría de Posgrado</h6>
                    
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                    consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    .</p>
                    <p class="card-text"><small class="text-muted">Numero de contacto: </small></p>
                    
                </div>
            </div>
        </div>
        
    </div>
     <div class="row mb-4">
        
        <div class="col col-lg-9">
            <div class="card cardEquipo">
                <div class="card-body px-4">
                    <h3 class="card-title textoGris">Mcp. Evelin Patricia Gutiérrez Castro</h3>
                    <div class="divisor"></div>
                    <h6>Coordinadora Secretaría de Posgrado</h6>
                    
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                    consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    .</p>
                    <p class="card-text"><small class="text-muted">Numero de contacto: </small></p>
                </div>
            </div>
        </div>
        <div class="col col-lg-3">
            <img class="img-fluid" src="{{asset('img/organos/IMG_6691.jpg')}}" alt="">
        </div>
        
    </div>
    
</div>
@endsection
