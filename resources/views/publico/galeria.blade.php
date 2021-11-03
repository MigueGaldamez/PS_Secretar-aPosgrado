@extends('layouts.frontend',['subtitulo' => 'Galeria'])

@section('content')
@include('publico.cabecera',['titulo' => 'Galeria','descripcion'=>'De las zonas de la Universidad'])

<div class="colorGris mt-2">
    <div class="container-fluid col-11 py-2">
        {{--Inicio--}}
            
            <div class="swiper-container-wrapper">
            <!-- Slider main container -->
                <div class="swiper-container gallery-top">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                        <div class="swiper-slide" style="background-image:url('https://i0.wp.com/bloquepopularjuvenil.org/wp-content/uploads/2020/01/Minerva-UES.jpg?fit=627%2C360');">
                            <span class="title">Responsive vertical thumbnail gallery</span>
                            <span class="description">Scale screen to see effect</span>
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="swiper-slide" style="background-image:url('https://diariolahuella.com/wp-content/uploads/2020/08/ues.jpg');">
                            <div class="title">Slide 2</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="title">Slide 3</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="title">Slide 4</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="title">Slide 5</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                        <div class="swiper-slide">
                            <div class="title">Slide 6</div>
                            <div class="description">Lorem ipsum dolor sit amet</div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- Slider thumbnail container -->
                <div class="swiper-container gallery-thumbs">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                        <div class="swiper-slide" style="background-image:url('https://i0.wp.com/bloquepopularjuvenil.org/wp-content/uploads/2020/01/Minerva-UES.jpg?fit=627%2C360');">Slide 1</div>
                        <div class="swiper-slide" style="background-image:url('https://diariolahuella.com/wp-content/uploads/2020/08/ues.jpg');"><div class="title">Slide 2</div></div>
                        <div class="swiper-slide" >Slide 3</div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide">Slide 5</div>
                        <div class="swiper-slide">Slide 6</div>
                    </div>
                </div>
            </div>
        {{--Fin--}}

    
    </div>
</div>

        <div class="container-ima my-4">
            <div class="box-ima">
                <img src="https://i0.wp.com/bloquepopularjuvenil.org/wp-content/uploads/2020/01/Minerva-UES.jpg?fit=627%2C360">
                <span>Minerva</span>
            </div>
            <div class="box-ima">
                <img src="https://diariolahuella.com/wp-content/uploads/2020/08/ues.jpg">
                <span>Secretaria de posgrado</span>
            </div>
            <div class="box-ima">
                <img src="https://source.unsplash.com/1000x804">
                <span>Hover</span>
            </div>
            <div class="box-ima">
                <img src="https://source.unsplash.com/1000x806">
                <span>Effect</span>
            </div>
            </div>



{{--FIN--}}
@endsection
