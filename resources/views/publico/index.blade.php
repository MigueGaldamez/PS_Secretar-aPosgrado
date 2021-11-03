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
    <div class="row negativoBanner ">          
            <a class="col col-lg-3 col-md-6 col-sm-12 col-12 btn card button-container h-100" href="{{route('oferta')}}">
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
     
             <a class="col col-lg-3 col-md-6 col-sm-12 col-12 btn card button-container h-100" href="{{route('oferta')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('img/iconos/research.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                             <h4 class="text-start text-uppercase textoDuro3"><b>Investigaciones</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-12 col-12 btn card button-container h-100" href="{{route('oferta')}}">
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
            <a class="col col-lg-3 col-md-6 col-sm-12 col-12 btn card button-container h-100" href="{{route('tesisPosgrados')}}">
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
<div class="container-fluid">
    
    <div class="row p-4">
        <div class="col col-12 col-lg-8 col-sm-12">
            <div class="row">
                <div class="box col-11 mt-4 mx-auto">
                    <h1 class="textoGris text-uppercase textoDuro">Quienes somos</h1>
                    <div class="titulohr mb-4"></div>
                    <p>La Secretaría de Posgrado de la Universidad de El Salvador es una
                    dependencia administrativa de la <b>Vicerrectoría Académica</b>, cuya
                    finalidad es contribuir al fortalecimiento del sistema de posgrado y
                    atender las necesidades de formación y educación avanzada en la
                    UES.
                    Se responsabiliza, además, de coordinar actividades académicas y
                    administrativas del Sistema de Estudios de Posgrado (SEP); del mismo
                    modo, la Secretaría instrumentaliza y ejecuta políticas de posgrado,
                    está obligada a promover y encaminar los Programas de Posgrado
                    hacia la excelencia académica siendo fiel a su misión con el
                    compromiso de formar especialistas con conocimiento científico,
                    tecnológico y humanístico para contribuir al desarrollo integral de la
                    sociedad.</p>
                </div>
                
            </div>   
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="box box-down pink">
                        <img class="imgMVV" src="{{asset('img/iconos/mision.png ')}}" alt="" height="80">
                        <h2>Mision</h2>
                        <p>Somos un Sistema de Posgrado de carácter público comprometido con
                        la formación de especialistas y la generación de conocimientos
                        científico, tecnológico y humanístico para contribuir con pertinencia al
                        desarrollo integral de la sociedad.</p>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="box box-down cyan">
                    <img class="imgMVV" src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
                        <h2>Vision</h2>
                        <p>Ser el Sistema Rector de los Posgrados, promotor de la excelencia e
                        innovación académica continua, alta calidad científica, tecnológica y
                        humanística, comprometida con la sociedad salvadoreña y
                        centroamericana.</p>
                    
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="box box-down red">
                  
                        <h2>Valores</h2>
                        <p>Valores Institucionales y Estratégicos</p>  
                        <img class="imgMVV"  src="{{asset('img/iconos/values.png ')}}" alt="" height="80">
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li> Responsabilidad</li>
                                    <li> Equidad</li>
                                    <li> Solidaridad</li>
                                    <li> Ética</li>
                                    <li> Respeto</li>
                                    <li> Excelencia en el desempeño</li>
                                </ul>
                                
                            </div>
                            <div class="col">
                                <ul>
                                    
                                    <li> Visión de Futuro</li>
                                    <li> Trabajador responsable</li>
                                    <li> Compromiso social</li>
                                    <li> Excelencia académica</li>
                                    <li> Profesionalismo</li>
                                    <li> Creatividad</li>
                                    <li> Multidisciplinariedad</li>
                                </ul>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box col-10 mt-4 mb-4 mx-auto ">
                    <h1 class="textoGris text-uppercase textoDuro">Informacion de contacto</h1>
                      <div class="titulohr mb-4"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>   
        </div>
        <div class="col col-12 col-lg-4 col-sm-12">
                <h3 class="text-center tituloSuperior text-uppercase  textoDuro mt-4"><span>Noticias Relevantes</span></h3>
                <div class="titulohr mb-2 mt-2"></div>
                <div class=" calloutIL calloutIL-info row overflow-hidden">
                    <div class="col">
                        <a href="" class="text-dark">
                        <span><b>UES: 179 años promoviendo el arte y la cultura.</b></span>
                        </a>
                        <br>
                        <span class=""><small >Martes 31 de agosto de 2021</small></span>
                    </div>
                    <div class="col imagenNoticiaIndex">
                        <img class="img-fluid " src="{{asset('img/facultades/tres.jpg')}}" alt="">
                    </div>
                
                </div>
                <div class=" calloutIL calloutIL-info row overflow-hidden">
                    <div class="col">
                        <a href="" class="text-dark">
                        <span><b>Exponen raíces de la desigualdad en las sociedades actuales de Latinoamérica.</b></span>
                        </a>
                        <br>
                        <span class=""><small >Martes 31 de agosto de 2021</small></span>
                    </div>
                    <div class="col imagenNoticiaIndex">
                        <img class="img-fluid " src="{{asset('img/facultades/tres.jpg')}}" alt="">
                    </div>
                
                </div>
                <div class=" calloutIL calloutIL-info row overflow-hidden">
                    <div class="col">
                        <a href="" class="text-dark">
                        <span><b>Convocan a todos los profesores de la UES a publicar libros de texto e investigaciones.</b></span>
                        </a>
                        <br>
                        <span class=""><small >Martes 31 de agosto de 2021</small></span>
                    </div>
                    <div class="col imagenNoticiaIndex">
                        <img class="img-fluid " src="{{asset('img/facultades/tres.jpg')}}" alt="">
                    </div>
                
                </div>
        </div>
    </div>
</div>
@endsection
