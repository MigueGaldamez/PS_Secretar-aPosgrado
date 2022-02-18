@extends('layouts.frontend',['subtitulo' => 'Galeria'])

@section('content')
@include('publico.cabecera',['titulo' => 'Galeria Fotográfica','descripcion'=>'del campus de la Universidad'])

<div class="py-2 mb-2 mt-2">
<div class="titulohr"></div>
    <h2 class="textoSuavecito text-center textoGris"><span >Campus universitario</span></h2>
    <div class="container">
    <span class="">La UES cuenta con un amplio campus universitario con áreas inclusivas en las 12 facultades, áreas recreativas como el polideportivo y el cine teatro, además de numerosos auditorios en donde se desarrollan principalmente las actividades académicas. </span>

    </div>
    
</div>
<div class="colorGris mt-1">
    <div class="container-fluid col-11 py-2">    
         {{--Inicio--}} 
        <div class="swiper-container-wrapper">
            <div class="swiper-container gallery-top" id="galeria1To">
                <div class="swiper-wrapper">
                    @foreach ($fotos1 as $item1)
                            <div class="swiper-slide" style="background-image:url('{{$item1->urlImagen}}');">
                            <span class="title">{{$item1->titulo}}</span>
                            <span class="description">{{$item1->subtitulo}}</span>
                        </div>
                    @endforeach    
                </div>
                <div class="swiper-button-next" id="galeria1sig"></div>
                <div class="swiper-button-prev" id="galeria1prev"></div>
            </div>
            
            <div class="swiper-container gallery-thumbs" id="galeria1Tu">                 
                <div class="swiper-wrapper">     
                    @foreach ($fotos1 as $item1)
                            <div class="swiper-slide" style="background-image:url('{{$item1->urlImagen}}');"><div class="title"><small>{{$item1->titulo}}</small></div></div>
                    @endforeach            
                </div>
            </div>
        </div>
        {{--Fin--}}
    </div>
</div>
<br>
<div class="py-2 mb-2 mt-2">
<div class="titulohr"></div>
    <h2 class="textoSuavecito text-center textoGris"><span >Arte, cultura y deporte</span></h2>
    <div class="container">
    <span class="">
    Como parte de la vida universitaria, la UES es el escenario de diferentes manifestaciones artísticas y culturales que promueven la integración de diferentes formas de ver el mundo. Asimismo, la UES potencia distintas áreas del deporte, como parte complementaria a la formación académica facilitando en sus estudiantes la adquisición de nuevas destrezas que contribuyan a la integración de la sociedad. 
    </span>

    </div>
    
</div>
{{----}}
<div class="colorGris mt-1">
    <div class="container-fluid col-11 py-2">    
         {{--Inicio--}} 
        <div class="swiper-container-wrapper">
            <div class="swiper-container gallery-top" id="galeria2To">
                <div class="swiper-wrapper">
                    @foreach ($fotos2 as $item2)
                            <div class="swiper-slide" style="background-image:url('{{$item2->urlImagen}}');">
                            <span class="title">{{$item2->titulo}}</span>
                            <span class="description">{{$item2->subtitulo}}</span>
                        </div>
                    @endforeach    
                </div>
                <div class="swiper-button-next" id="galeria2sig"></div>
                <div class="swiper-button-prev" id="galeria2prev"></div>
            </div>
            
            <div class="swiper-container gallery-thumbs" id="galeria2Tu">                 
                <div class="swiper-wrapper">     
                        @foreach ($fotos2 as $item2)
                            <div class="swiper-slide" style="background-image:url('{{$item2->urlImagen}}');"><div class="title"><small>{{$item2->titulo}}</small></div></div>
                    @endforeach            
                </div>
            </div>
        </div>
        {{--Fin--}}
    </div>
</div>
{{----}}
<br>
<div class="py-2 mb-2 mt-2">
<div class="titulohr"></div>
    <h2 class="textoSuavecito text-center textoGris"><span >Investigación y Proyección Social</span></h2>
    <div class="container">
    <span class="">
La Universidad de El Salvador promueve la investigación científica desde los diferentes campos de la ciencia para ponerlas al servicio de la sociedad. Como comunidad universitaria, la UES integra diferentes estrategias para cooperar en el desarrollo íntegro del profesional y de la sociedad salvadoreña.    </span>

    </div>
    
</div>
{{----}}
<div class="colorGris mt-1">
    <div class="container-fluid col-11 py-2">    
         {{--Inicio--}} 
        <div class="swiper-container-wrapper">
            <div class="swiper-container gallery-top" id="galeria3To">
                <div class="swiper-wrapper">
                    @foreach ($fotos3 as $item3)
                            <div class="swiper-slide" style="background-image:url('{{$item3->urlImagen}}');">
                            <span class="title">{{$item3->titulo}}</span>
                            <span class="description">{{$item3->subtitulo}}</span>
                        </div>
                    @endforeach    
                </div>
                <div class="swiper-button-next" id="galeria3sig"></div>
                <div class="swiper-button-prev" id="galeria3prev"></div>
            </div>
            
            <div class="swiper-container gallery-thumbs" id="galeria3Tu">                 
                <div class="swiper-wrapper">     
                        @foreach ($fotos3 as $item3)
                            <div class="swiper-slide" style="background-image:url('{{$item3->urlImagen}}');"><div class="title"><small>{{$item3->titulo}}</small></div></div>
                    @endforeach            
                </div>
            </div>
        </div>
        {{--Fin--}}
    </div>
</div>
{{----}}
<br>
<div class="py-2 mb-2 mt-2">
<div class="titulohr"></div>
    <h2 class="textoSuavecito text-center textoGris"><span >Eventos Académicos</span></h2>
    <div class="container">
    <span class="">
        La Universidad de El Salvador se caracteriza por la excelencia académica, es por ello que constantemente realiza firma de convenios nacionales e internacionales para mantener y elevar el desarrollo de la comunidad universitaria al servicio de la nación.
    </div>
    
</div>
{{----}}
<div class="colorGris mt-1 mb-4">
    <div class="container-fluid col-11 py-2">    
         {{--Inicio--}} 
        <div class="swiper-container-wrapper">
            <div class="swiper-container gallery-top" id="galeria4To">
                <div class="swiper-wrapper">
                    @foreach ($fotos4 as $item4)
                            <div class="swiper-slide" style="background-image:url('{{$item4->urlImagen}}');">
                            <span class="title">{{$item4->titulo}}</span>
                            <span class="description">{{$item4->subtitulo}}</span>
                        </div>
                    @endforeach    
                </div>
                <div class="swiper-button-next" id="galeria4sig"></div>
                <div class="swiper-button-prev" id="galeria4prev"></div>
            </div>
            
            <div class="swiper-container gallery-thumbs" id="galeria4Tu">                 
                <div class="swiper-wrapper">     
                        @foreach ($fotos4 as $item4)
                            <div class="swiper-slide" style="background-image:url('{{$item4->urlImagen}}');"><div class="title"><small>{{$item4->titulo}}</small></div></div>
                    @endforeach            
                </div>
            </div>
        </div>
        {{--Fin--}}
    </div>
</div>
{{----}}
    {{--FIN--}}
@endsection
