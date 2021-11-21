@extends('layouts.frontend',['subtitulo' => 'Enlaces'])

@section('content')

@include('publico.cabecera',['titulo' => 'Detalle noticia','descripcion'=>''])
<div class="container">
    <div class="row">
        <div class="col">
          
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-7">
            
           <h2 class="textoGris mb-0 ps-0 mt-4">Noticia</h2>   
                <div class="titulohr mb-4"></div>
                 <img src="{{asset('img/banners/IMG_2065.jpg')}}"  alt="..." class="bannerLink">
            <p class="has-dropcap noticiaContenido mt-4">
                    El Rector de la Universidad de El Salvador, Msc. Roger Arias, participó en la Comisión de Juventud y Deportes este  1° de septiembre para recomendar reformas a la Ley General de Juventud y para solicitar apoyo en el financiamiento de proyectos en beneficio del sector estudiantil de la UES.

                Arias insistió en la necesidad de llevar a más jóvenes el derecho a la Educación Superior gratuita y de calidad. «Nuestra apuesta es llevar una sede de la UES cada departamento del país, porque no hay otra forma de salir del subdesarrollo que no sea por medio de la Educación. Y para ello necesitamos financiamiento», pidió el funcionario.
                    </p>
            <img src="{{asset('img/banners/IMG_2065.jpg')}}"  alt="..." class="bannerLink">
            <p class="has-dropcap noticiaContenido mt-4">
            
                    En ese sentido, el rector informó que necesitan fondos para la construcción  de sedes en La Unión, Usulután, Ahuchapán y Sonsonate, para 2022, pues ya existe acercamientos con autoridades legislativas y locales para la implementación en  esos lugares.

                Se pidió ayuda para crear la Facultad de Artes, que por el momento es una Escuela de la Facultad de Ciencias y Humanidades, y también la construcción de Residencias Universitarias para jóvenes del interior del país y de escasos recursos.

                Por otra parte, se dio a conocer que la UES tiene proyectos deportivos y culturales y además recordó que gracias a su gestión se logró impulsar la gratuidad de la Educación para todos los estudiantes de pregrado, así como un histórico incremento de estudiantes que reciben becas por su situación económica y por excelencia académica.

                Asimismo, las autoridades recordaron que se ha habilitado la exoneración del examen de admisión para los aspirantes que provienen de los municipios catalogados de extrema pobreza.
            <figure class="text-end">
              
                <figcaption class="blockquote-footer">
                   Autor de la noticia <cite title="Source Title">Fecha</cite>
                </figcaption>
            </figure>
        </div>
        <div class="col col-lg-4 mt-4 offset-1">
             <h2 class="text-dark mb-0 ps-0   ">Más Noticias</h2>   
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
