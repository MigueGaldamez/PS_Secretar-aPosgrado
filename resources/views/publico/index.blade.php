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

    <div class="container px-0 col-10">
        <div class="row negativoBanner ">          
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container h-100" href="{{route('oferta')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('img/iconos/principal4.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                            <h4 class="text-start text-uppercase textoDuro3"><b>Oferta Academica</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container h-100" href="{{route('investigaciones')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('img/iconos/principal1.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-9">
                            <h4 class="text-start text-uppercase textoDuro3"><b>Investigaciones</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container h-100" href="{{route('diplomados')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('img/iconos/principal2.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                            <h4 class="text-start text-uppercase textoDuro3"><b>Educacion Continua</b></h4>
                        </div>
                    </div>         
                </div>
            </a>
            <a class="col col-lg-3 col-md-6 col-sm-6 col-6 btn card button-container h-100" href="{{route('tesisPosgrados')}}">
                <div class="card-body py-0 px-1">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('img/iconos/principal3.png')}}" class="imagenIconoIni">
                        </div>
                        <div class="col-8">
                            <h4 class="text-start text-uppercase textoDuro3"><b>Tesis de Posgrados</b></h4>
                        </div>
                    </div>         
                </div>
            </a>   
        </div>
    </div>
   
    <div class="container-fluid bg-grisFondo">
        <div class="row p-4">
            <div class="col col-12 col-lg-8 col-sm-12">
                <div class="row">
                    <div class="box col-11 mt-4 mx-auto  bg-griscito">
                        <h1 class="textoGris text-uppercase textoDuro">Quienes somos</h1>
                        <div class="titulohr mb-4"></div>
                        <p>{{$informacion->quienesSomos}}</p>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                        <div class="box box-down pink  bg-griscito">
                            <img class="imgMVV" src="{{asset('img/iconos/mision.png ')}}" alt="" height="90">
                            <h2>Mision</h2>
                            <p>{{$informacion->mision}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                        <div class="box box-down cyan  bg-griscito">
                        <img class="imgMVV" src="{{asset('img/iconos/vision.png ')}}" alt="" height="90">
                            <h2>Vision</h2>
                            <p>{{$informacion->vision}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="box box-down red  bg-griscito">
                            <h2>Valores</h2>
                            <p>Valores Institucionales y Estratégicos</p>  
                            <img class="imgMVV"  src="{{asset('img/iconos/valores.png ')}}" alt="" height="90">
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
                    <div class="box col-10 mt-4 mb-4 mx-auto  bg-griscito">
                        <h1 class="textoGris text-uppercase textoDuro">Informacion de contacto</h1>
                        <div class="titulohr mb-2"></div>
                        <p>No te olvides de seguirnos en nuestras redes</p>
                         <div class="effect cinna">
    
                            <div class="buttons">
                                <a href="#" class="fb" title="@PosgradosUES"><i class="fa fa-facebook" aria-hidden="true"></i></a>

                                <a href="#" class="insta" title="@posgradosues"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="in" title="Secretaria.posgrado@ues.edu.sv"><i class="fa fa-envelope-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        
                      
                    </div>
                </div>   
            </div>
            <div class="col col-12 col-lg-4 col-sm-12">
                <h3 class="text-center tituloSuperior text-uppercase  textoDuro mt-4"><span>Noticias Relevantes</span></h3>
                <div class="titulohr mb-2 mt-2"></div>
                <div class=" calloutIL calloutIL-info row overflow-hidden  bg-griscito">
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
                <div class=" calloutIL calloutIL-info row overflow-hidden  bg-griscito">
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
                <div class=" calloutIL calloutIL-info row overflow-hidden  bg-griscito">
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
                <div class="row">
                    <div class="box col-11 mt-4 mx-auto  bg-griscito">
                        <h1 class="textoGris text-uppercase textoDuro">Acreditación</h1>
                        <div class="titulohr mb-4"></div>
                        <p>Universidad de El Salvador, única institución pública de educación superior de la República de El Salvador con reconocimiento en la excelencia académica.</p>
                        <img class="img-fluid mt-1 mb-3" src="{{asset('img/acreditacion/ranking.png')}}" alt="">
                        <p>
                        Acreditada por en 2019 por el Instituto de Alto Consejo de la Evaluación de la Investigación de la Educación Superior (Hcéres-Francia)
                        </p>
                        <div class="text-center">
                            <img class="mx-auto" src="{{asset('img/acreditacion/hceres.png')}}" alt="" height="150px">
                        </div>
                    </div>   
                </div>   
            </div>
        </div>
    </div>
@endsection
