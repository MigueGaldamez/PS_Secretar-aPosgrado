@extends('layouts.frontend',['subtitulo' => 'Inicio'])

@section('content')

<div class="container-fluid cardImagenBanner mt-n4">       
    <img src="{{asset('/img/PortadaFB-01.svg')}}" class="imgBannerInicio">
    <div class="row pt-4 imagenFondo">
        <div class="col-9 mx-auto">
            <div class="row">
                <div class="col-5 offset-1">     
                    <ul class="list-unstyled mb-0 pt-3 text-white font-weight-light d-none">
                        <li class="lh-sm  fontInicio pt-3"><b>Estudia tu</b></li>
                        <li class="lh-sm  fontInicio"><b>Posgrado en la</b></li>
                        <li class="lh-sm  fontInicio"><b>UES</b></li>
                        <li class="lh-sm  paddingBotonInicio  pb-3">Pequeña descripcion.</li>
                    </ul>
                    <button type="button" class="d-none btn btn-danger mt-3 text-light text-start ms-4">Ver más</button>
                </div>
                <div class="col offset-1 d-none">
                    <img src="{{asset('img/quimicaRedondo.png')}}"  class="img-fluid" max-width="350">
                </div>
             </div>
        </div>
    </div> 
</div>
<div class="container px-0 col-9">
    <div class="row negativoBanner">          
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container" href="{{route('oferta')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                         <div class="col-4">
                             <img src="{{asset('img/iconos/book.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                             <h4 class="text-start text-uppercase textoDuro3"><b>Oferta Academica</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container" href="{{route('investigaciones')}}">
                <div class="card-body py-0 px-0">
                    <div class="row">
                        <div class="col-2">
                              <img src="{{asset('img/iconos/research.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-10">
                             <h4 class="py-auto text-start text-uppercase textoDuro3 text"><b>Investigaciones</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container" href="{{route('oferta')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('img/iconos/book.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                             <h4 class="text-start text-uppercase textoDuro3"><b>Educacion Continua</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container" href="{{route('oferta')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-4">
                             <img src="{{asset('img/iconos/book.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                             <h4 class="text-start text-uppercase textoDuro3"><b>Tesis de Posgrados</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            
                                 
        
        
    </div>
</div>
<div class="row text-center">
        
    </div>
<div class="container">
    <div class="row">
        <div class="box col-11 mt-4 mx-auto">
            <h1 class="tituloSomos textoGris text-uppercase textoDuro">Quienes somos</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
    </div>   
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box box-down pink">
                <img class="imgMVV" src="{{asset('img/iconos/mision.png ')}}" alt="" height="80">
                <h2>Mision</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                 
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box box-down cyan">
             <img class="imgMVV" src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
                 <h2>Vision</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
               
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="box box-down red">
             <img class="imgMVV"  src="{{asset('img/iconos/values.png ')}}" alt="" height="80">
                <h2>Valores</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. </p>
                <ul>
                    <li>Valor 1</li>
                    <li>Valor 1</li>
                    <li>Valor 1</li>
                    <li>Valor 1</li>
                </ul>
               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mt-4 mb-4 mx-auto ">
            <h1 class="tituloSomos textoGris text-uppercase textoDuro">Informacion de contacto</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>   
</div>

@endsection
