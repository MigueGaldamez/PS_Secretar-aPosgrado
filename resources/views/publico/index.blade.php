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
    <div class="catalogoIcono">
        <a href="{{route('catalogoC')}}">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1655.15 742.56"><rect x="172.11" y="191.95" width="1325.89" height="391.11" style="fill:#630303"/><path d="M64.6,45.84C124,43.8,183.65,46,243.1,45c-.18,5.34-.08,10.68-.1,16-54.89-.4-109.12,2.4-164,2,0,49.12-.12,98.22-.1,147.34H60c-.18-52.1.12-104.21,0-156.32C59.8,50.65,62.08,47.79,64.6,45.84Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M383.66,45.25C563.83,46,746.78,42.66,927,46.35V59H311q0-6.84,0-13.68C335.19,44.75,359.55,45.69,383.66,45.25Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M139.92,133.34c500-.08,1001-1.74,1500.67.55,2.07.12,4.17.12,6.28.12,2.21,194.19,2,389.6.08,583.59-1.49,1.44-3,2.9-4.38,4.39-502.61-.42-1005.33.85-1507.89-.44,0-.67-.05-2-.06-2.65l-1.07,1.76c-1-.23-.27-3.41-.59-4.62l2-.09c.89-94-1.7-188.88.89-282.54,1.15-96.53-1.67-193.86,1-290,.14-2.44.13-4.88.11-7.32l-2.49-.25C136,134.35,138.08,134.16,139.92,133.34ZM153,152V704c17.47-.07,34.95.14,52.42-.11,474.62-2,950.91-1.35,1425.58.11V152Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M1695,166h20.1c-.65,129.26.11,258.51-.14,387.78-6.66-.24-13.31-.37-20-.55Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M61.12,399q-.39-57.72-.77-115.45c5.45.16,10.91.06,16.36.09-.95,126.66.15,253.43,0,380.12-4.52.31-9,.6-13.57.79C62.29,576.07,62.4,487.52,61.12,399Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M982.5,384.73c22.28-5.41,31.37,20.08,31,38,.27,18,1.31,43.39-17.39,52.69-22.93,8.44-34-16.51-34.3-35.47C961.24,420.88,960.36,391.76,982.5,384.73Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M1696,626.54c6.09-.11,12.2.21,18.3-.21-1.75,52.68,2.41,106-1.28,158.42-7.58,3.66-16.28,2-24.44,2.14-52.29-2.57-105.77,0-158.45-.89,0-4.38-.89-8.67-1.26-13q83.57,0,167.13,0Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M846.12,772.63c204.83-.16,409.67.42,614.5.59q.17,5.88.38,11.78c-204.87.65-410.09-1.25-614.81.65C846.07,781.31,845.84,777,846.12,772.63Z" transform="translate(-59.95 -44.58)" style="fill:#630303"/><path d="M781.43,371.16c2.73-8,5.38-16.16,8.56-24,7.4-.39,14.82-.1,22.23-.11-7.45,7.62-15.18,15-22.7,22.53C787.55,372,784.11,370.92,781.43,371.16Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M474.59,394.68c40.44-37.14,71.85,5.6,75.73-15.62l3-.09q.08,17.1,0,34.21l-3.14-.18c-5.22-30.18-45.62-38.81-59.39-10-8.24,20.54-8.37,49,7.21,66.12,17.1,14.48,41.11,4.16,53.64-11.3,0,2.89.34,5.85-.26,8.7-18.66,20.11-53,20.39-74.36,4.44C453.31,452.71,453.48,414.82,474.59,394.68Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M608,378.87l1.57.45c12.2,27.23,24.08,54.63,36.23,81.89,3.26,6.72,6.44,15.12,15,15.9l.08,2.89c-16.17.18-32.36.34-48.51-.08,0-.68,0-2,0-2.71,21.56.25,7.52-13.47,3.77-25.12-11.57.18-23.13-.11-34.69.15-5.25,11.72-12.82,24.91,6.94,24.65,0,.81,0,2.44,0,3.25-11.08,0-22.16,0-33.24,0,0-.77,0-2.32,0-3.09,8.73-1.35,12.76-9.57,16.16-16.79C583.65,433.17,595.51,405.87,608,378.87ZM584.39,446q14.54,0,29.09,0c-4.75-10.91-9.28-21.93-14.4-32.67C593.89,424.07,589.15,435,584.39,446Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M790.07,378.88l1.58.46c12.08,27,23.83,54.07,35.84,81.06,3.51,9.5,11.2,21.23,22.68,14.84,3.52-2.09,3.3-6.67,3.41-10.22q.09-34.54,0-69.09c1-9.94-5.13-12.36-13.93-11.87,0-.77,0-2.3,0-3.07,17.76,0,35.52-.05,53.28.05,0,.75,0,2.25,0,3-8.86-.53-16.24,1.5-15.08,12,1,24.81-2,50.32,1.26,74.79,5.38,5.63,19.65,2.7,27.06,2.35,13.67-2.56,18.9-17.27,22.26-29.1l3.56-.07c-1.27,12-2.57,24.05-3.75,36.08-44.58-.11-89.21.42-133.79-.19,0-.67,0-2,0-2.68,3.79-.81,9,.28,11.55-3.32.58-7.66-5.3-14.75-7.8-21.84-11.55.23-23.11-.12-34.66.19-5.25,11.76-12.83,24.86,7,24.64,0,.81,0,2.41,0,3.22-11.11,0-22.22.1-33.33-.06,0-.75,0-2.26.06-3,8.71-1.42,12.76-9.49,16.14-16.76C765.68,433.22,777.55,405.89,790.07,378.88ZM766.43,446q14.55,0,29.1,0c-4.75-10.93-9.31-22-14.41-32.74C776,424.07,771.2,435,766.43,446Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M974.57,379.69C1052.86,364.13,1066,478.56,989,482,926.43,486.51,913.77,392.45,974.57,379.69Zm7.93,5c-22.15,7-21.25,36.14-20.71,55.21.34,18.94,11.37,43.93,34.3,35.47,18.71-9.31,17.65-34.7,17.39-52.69C1013.87,404.82,1004.77,379.3,982.5,384.73Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M1045.41,419c7-31.86,44.24-47.38,73.7-37.26,7.49,2.44,16.65,8.19,19.82-2.83l2.77.27q-.2,16.92,0,33.84H1139c-8.66-30.4-53.09-42.44-64.5-7.66-10.28,32.09-2.56,85.13,42.85,68.64,0-9,.39-18-.21-27-1-5.57-8-5.94-12.46-5.94,0-.76,0-2.28-.07-3,16,.28,32.18-.53,48.13.26.21.69.61,2.07.81,2.76-3.52.55-7.81.28-10.32,3.28-3.73,8.95-.7,20-1.56,29.62C1097.7,494.14,1033.81,477.64,1045.41,419Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M1192.51,379.7c80.37-15.62,90.86,102.57,11.52,102.3C1143.12,483.17,1133.39,392.11,1192.51,379.7Zm8,5c-26.16,8.09-23.26,53.3-17,74.36,3.85,15.93,24.43,24.09,36.84,12.27C1238.32,453.64,1238.86,375.76,1200.54,384.72Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M648.22,381.09c29.86-.18,59.73-.1,89.6,0-.09,9,0,18,0,27l-2.83,0c-3.34-17.23-13.17-22.65-30-20.95-.12,25.93,0,51.87,0,77.8C704,475,710.12,477.23,719,477.14c0,.74-.07,2.23-.1,3q-25.95.08-51.89,0v-3c8.64.31,14.79-2.35,13.84-12.08q.06-39,0-77.91c-16.48-1.53-26.81,3.76-29.7,20.9l-2.91.09C648.29,399.1,648.32,390.09,648.22,381.09Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M1195.67,526.26c8-37,72.27-14.62,13.56,36.69,7.42-.43,15.36,1.33,22.47-1.09,2-1.56,2.7-4.53,5.36-5.25-.81,6.49-2.42,12.84-3.49,19.29-13.26.1-26.54.31-39.79-.12,10-14.49,27.55-28,25.94-47.23-2.38-12.58-17.25-11.78-22.72-1.75Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M1257.42,508.57c33.7-7.77,35.28,69.59,3.53,68.46C1234.05,574.29,1233.62,516.11,1257.42,508.57Zm2.74,2.68c-7.55.73-4.48,50.24-3.43,57.89.29,3.61,4.56,6.21,7.77,4.25,3.07-2.48,3.3-6.83,3.56-10.46C1266.45,554.45,1273.75,506.68,1260.16,511.25Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M1285.76,526.4c7.58-37.33,72.31-14.7,13.48,36.54,7.42-.42,15.39,1.35,22.5-1.1,2-1.55,2.64-4.55,5.32-5.2-.82,6.48-2.42,12.82-3.5,19.26-13.25.09-26.52.32-39.77-.12,9.94-14.4,27.17-27.7,26-46.78-2-12.85-17.15-12.47-22.77-2.26Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/><path d="M1330.75,526.26c7.78-37,72.23-14.61,13.5,36.68,7.4-.42,15.37,1.34,22.48-1.09,2-1.58,2.67-4.53,5.32-5.24-.79,6.49-2.42,12.83-3.47,19.27-13.26.14-26.54.32-39.8-.09,10-14.42,27.21-27.73,26-46.83-2-12.84-17.3-12.45-22.78-2.12Z" transform="translate(-59.95 -44.58)" style="fill:#d3c5c5"/></svg>
        </a>
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
