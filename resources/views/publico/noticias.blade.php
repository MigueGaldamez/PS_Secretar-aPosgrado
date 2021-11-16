@extends('layouts.frontend',['subtitulo' => 'Noticias'])

@section('content')

@include('publico.cabecera',['titulo' => 'Noticias','descripcion'=>''])
<div class="container pb-4">
     <div class="row mb-4">
        <div class="col">
            <img src="{{asset('img/banners/IMG_1194.jpg')}}"  alt="..." class="bannerLink">
        </div>
    </div>
            {{--Inicio buscar--}}
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                      <h2 class="text-dark mb-0 ps-0">Busqueda</h2>   
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

    
    <div class="row">
        {{--Inicio noticias--}}
        <div class="col-lg-7 mt-4">
            <div class="row">
                
            
                <h2 class="textoGris mb-0 ps-0">Noticias</h2>   
                <div class="titulohr mb-4"></div>
                <div class="col col-lg-6 col-sm-12 col-12 mb-4">
                    <div class="card sinBordes">
                        <img src="{{asset('img/enlaces/dos.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body paddinNoticias">
                                <b><a href="" class="text-dark"><h5 class="card-title">UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</h5></a></b>
                                <p class="card-text">El Rector de la Universidad de El Salvador, Msc. Roger Arias, participó en la Comisión de Juventud y Deportes este...</p>
                                <p class="card-text mt-n2"><small class="text-muted">Publicado por </small><b>Secretaría de Posgrado</b></p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12 col-12 mb-4">
                    <div class="card sinBordes">
                        <img src="{{asset('img/enlaces/uno.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body paddinNoticias">
                                <b><a href="" class="text-dark"><h5 class="card-title">UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</h5></a></b>
                                <p class="card-text">El Rector de la Universidad de El Salvador, Msc. Roger Arias, participó en la Comisión de Juventud y Deportes este...</p>
                                <p class="card-text mt-n2"><small class="text-muted">Publicado por </small><b>Secretaría de Posgrado</b></p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12 col-12 mb-4">
                    <div class="card sinBordes">
                        <img src="{{asset('img/enlaces/dos.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body paddinNoticias">
                                <b><a href="" class="text-dark"><h5 class="card-title">UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</h5></a></b>
                                <p class="card-text">El Rector de la Universidad de El Salvador, Msc. Roger Arias, participó en la Comisión de Juventud y Deportes este...</p>
                                <p class="card-text mt-n2"><small class="text-muted">Publicado por </small><b>Secretaría de Posgrado</b></p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12 col-12 mb-4">
                    <div class="card sinBordes">
                        <img src="{{asset('img/enlaces/uno.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body paddinNoticias">
                               <a href="" class="text-dark"><h5 class="card-title"> <b>UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</b></h5></a>
                                <p class="card-text">El Rector de la Universidad de El Salvador, Msc. Roger Arias, participó en la Comisión de Juventud y Deportes este...</p>
                                <p class="card-text mt-n2"><small class="text-muted">Publicado por </small><b>Secretaría de Posgrado</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-lg-4 mt-4 offset-lg-1">

            <h2 class="text-dark mb-0 ps-0   ">Más Recientes</h2>   
            <div class="titulohr mb-4"></div>
           
                
                <div class="card mb-3 sinBordes ">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{asset('img/enlaces/dos.jpg')}}" class="img-fluid fullAlto" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body  paddinNoticias ps-2">
                            <b><a href="" class="text-dark"><h5 class="card-title">UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</h5></a></b>
                            
                          <p class="card-text"><small class="text-muted">Publicado </small><b>30 Septiembre 2021</b></p>
                        </div>
                        </div>
                    </div>
                </div>
                 <div class="card mb-3 sinBordes">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{asset('img/enlaces/uno.jpg')}}" class="img-fluid fullAlto" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body  paddinNoticias ps-2">
                            <b><a href="" class="text-dark"><h5 class="card-title">UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</h5></a></b>
                            
                          <p class="card-text"><small class="text-muted">Publicado </small><b>30 Septiembre 2021</b></p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 sinBordes">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{asset('img/enlaces/tres.jpg')}}" class="img-fluid fullAlto" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body  paddinNoticias ps-2">
                            <b><a href="" class="text-dark"><h5 class="card-title">UES busca apoyo de la Asamblea para impulsar proyectos estudiantiles.</h5></a></b>
                            
                           <p class="card-text"><small class="text-muted">Publicado </small><b>30 Septiembre 2021</b></p>
                        </div>
                        </div>
                    </div>
                </div>
           
                
            
        </div>
       
    </div>
</div>

@endsection
