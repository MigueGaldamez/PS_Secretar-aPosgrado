@extends('layouts.frontend',['subtitulo' => 'Galeria'])

@section('content')
@include('publico.cabecera',['titulo' => 'Galeria Fotográfica','descripcion'=>'del campus de la Universidad'])

<div class="py-2 mb-2">
    <h2 class="textoSuavecito text-center textoGris"><span >Nuestro Campus</span></h2>
     <div class="titulohr"></div>
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
<div class="py-2">
    <h2 class="textoSuavecito text-center textoGris"><span >Arte, Cultura y Deporte</span></h2>
    <div class="titulohr"></div>
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
<div class="py-2 colorGris mb-4">
    <h2 class="textoSuavecito text-center text-light"><span >Eventos Académicos</span></h2>
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
<div class="py-2 colorGris mb-4">
    <h2 class="textoSuavecito text-center text-light"><span > Investigación y Proyección Social</span></h2>
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
