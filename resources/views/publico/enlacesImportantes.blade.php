@extends('layouts.frontend',['subtitulo' => 'Enlaces'])

@section('content')

@include('publico.cabecera',['titulo' => 'Enlaces importantes','descripcion'=>'Otras secretarías'])
<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{asset('img/banners/IMG_1201.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-8">
                {{--Inicio buscar--}}
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="" class="col-form-label">Busqueda</label>
                    </div>
                    <div class="col">
                        <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-auto">
                        <span id="" class="form-text">
                      <button type="button" class="btn btn-secondary colorGris">Buscar</button>
                        </span>
                    </div>
                </div>
                {{--Fin buscar--}}
            <div class=" callout callout-danger row">
                <div class="col col-8 ">
                
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span><br>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. </span>
                     <br><a href="" class="">Visitar</a>
                </div>
                <div class="col col-4">
                    <img src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="" height="70">
                   
                </div>
            </div>
            <div class=" callout callout-danger row">
                <div class="col col-8 ">
                
                    <a href="" class="text-dark"><span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span><br></a>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. </span>
                   
                </div>
                <div class="col col-4">
                    <img src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="" height="70">
                  
                </div>
            </div>
            <div class=" callout callout-danger row">
                <div class="col col-8 ">
                
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span><br>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. </span>
                    <br><a href="" class="">Visitar</a>
                </div>
                <div class="col col-4">
                    <img src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="" height="70">
                  
                </div>
            </div>
            <div class=" callout callout-danger row">
                <div class="col col-8 ">
                
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span><br>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. </span>
                    <br><a href="" class="">Visitar</a>
                </div>
                <div class="col col-4">
                    <img src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="" height="70">
                  
                </div>
            </div>
            <div class=" callout callout-danger row">
                <div class="col col-8 ">
                
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span><br>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. </span>
                    <br><a href="" class="">Visitar</a>
                </div>
                <div class="col col-4">
                    <img src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="" height="70">
                  
                </div>
            </div>
        </div>
        <div class="col col-4">
            <h1 class="text-center tituloSuperior text-uppercase bordeBajo"><span>Enlaces mas visitados</span></h1>
             <div class=" calloutIL calloutIL-info row">
                <div class="col">
                
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span>
                   
                    <br><a href="" class="">Visitar</a>
                </div>
               
            </div>
            <div class=" calloutIR calloutIR-info row">
                <div class="col">
                
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span>
                   
                    <br><a href="" class="">Visitar</a>
                </div>
               
            </div>
              <div class=" calloutIL calloutIL-info row">
                <div class="col">  
                    <span><b>Enlace a las interfaces del proyecto del sitio web de la Secretaria de posgrado.</b></span>           
                    <br><a href="" class="">Visitar</a>
                </div>              
            </div>
        </div>
    </div>
</div>
@endsection
