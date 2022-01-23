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
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/IxS50uG.jpg');">
                            <span class="title">Galeria</span>
                            <span class="description">Scale screen to see effect</span>
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/x2fjApo.jpg');">
                            <div class="title">Slide 2</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/fttCfgV.jpg');">
                            <div class="title">Slide 3</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/h5hwwYr.jpg');">
                            <div class="title">Slide 4</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide"  style="background-image:url('https://i.imgur.com/Vw7ZC19.jpg');">
                            <div class="title">Slide 5</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide"  style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">
                            <div class="title">Slide 6</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide"  style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">
                            <div class="title">Slide 7</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                         <div class="swiper-slide"  style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">
                            <div class="title">Slide 8</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                         <div class="swiper-slide"  style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">
                            <div class="title">Slide 9</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                         <div class="swiper-slide"  style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">
                            <div class="title">Slide 10</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
               
                <div class="swiper-container gallery-thumbs">                 
                    <div class="swiper-wrapper">               
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/IxS50uG.jpg');">Slide 1</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/x2fjApo.jpg');"><div class="title">Slide 2</div></div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/fttCfgV.jpg');">Slide 3</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/h5hwwYr.jpg');">Slide 4</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/Vw7ZC19.jpg');">Slide 5</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">Slide 6</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">Slide 7</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/Vw7ZC19.jpg');">Slide 8</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">Slide 9</div>
                        <div class="swiper-slide" style="background-image:url('https://i.imgur.com/HQRu90g.jpg');">Slide 10</div>
                    </div>
                </div>
            </div>
        {{--Fin--}}
    </div>
</div>
<br>
<div class="py-2 mb-4">
    <h2 class="textoSuavecito text-center textoGris"><span >Arte, Cultura y Deporte</span></h2>
    <div class="titulohr mb-4"></div>
</div>
{{----}}

{{----}}
<br>
<div class="py-2 colorGris mb-4">
    <h2 class="textoSuavecito text-center text-light"><span >Eventos Académicos</span></h2>
</div>

<br>
<div class="py-2 colorGris mb-4">
    <h2 class="textoSuavecito text-center text-light"><span > Investigación y Proyección Social</span></h2>
</div>
    {{--FIN--}}
@endsection
