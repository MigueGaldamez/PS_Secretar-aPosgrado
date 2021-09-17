@extends('layouts.frontend')

@section('content')

<div class="container-fluid">        
    <div class="row pt-4 pb-3 colorGris imagenFondo" >
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
                    <img src="{{asset('img/quimicaRedondo.png')}}"  width="350">
                </div>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 mx-auto">
            <div class="row text-center mt-n5">
                <div class="col-sm pb-2">
                    <div class=" h-100 shadow">
                        <div class="row">
                            <div class="btn-group">
                                <a class="btn btn-light col p-3 button-container" href="{{route('oferta')}}">
                                    <div id="border"></div>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{asset('img/internado.png')}}" width="60">
                                        </div>
                                        <ul class="list-unstyled mb-0 col-10 ">
                                            <li class="lh-sm text-danger"><h3><b>  Oferta Academica.</b></h3></li>
                                            <li class="lh-sm"> Pequeña descripción de la oferta academica.</li>
                                        </ul>
                                    </div>
                                </a>
                                <a class="btn btn-light col p-3 button-container" href="">
                                    <div id="border"></div>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{asset('img/internado.png')}}" width="60">
                                        </div>
                                        <ul class="list-unstyled mb-0 col-10 ">
                                            <li class="lh-sm text-danger"><h3><b>  Oferta Academica.</b></h3></li>
                                            <li class="lh-sm"> Pequeña descripción de la oferta academica.</li>
                                        </ul>
                                    </div>
                                </a>
                                <a class="btn btn-light col p-3 button-container" href="{{route('oferta')}}">
                                    <div id="border"></div>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{asset('img/internado.png')}}" width="60">
                                        </div>
                                        <ul class="list-unstyled mb-0 col-10 ">
                                            <li class="lh-sm text-danger"><h3><b>  Oferta Academica.</b></h3></li>
                                            <li class="lh-sm"> Pequeña descripción de la oferta academica.</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
    
</div>
<div class="container">
    <div class="row">
        <div class="col-10 mt-4 mx-auto">
            <h1 class="tituloSomos textoGris">Quienes somos</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
    </div>   
    <div class="row">
        <div class="col">
            <div class="box box-down red">
                <h2>Mision</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <img class="imgMVV" src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
            </div>
        </div>
        <div class="col">
            <div class="box box-down cyan">
                 <h2>Vision</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <img class="imgMVV" src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
            </div>
        </div>
        <div class="col">
            <div class="box box-down red">
                <h2>Valores</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. </p>
                <ul>
                    <li>Valor 1</li>
                    <li>Valor 1</li>
                    <li>Valor 1</li>
                    <li>Valor 1</li>
                </ul>
                <img class="imgMVV" src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mt-4 mb-4 mx-auto">
            <h1 class="tituloSomos textoGris">Informacion de contacto</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>   
</div>

@endsection
