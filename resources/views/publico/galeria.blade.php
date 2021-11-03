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
<div class="py-2 colorGris mb-4">
    <h1 class="textoSuavecito text-center text-light"><span >Mas fotos</span></h1>
</div>
<div class=" col-12 pt-20">
    <div class="slides mx-auto">
        <div class="slide">
          <div class="bg">
          <img src="https://static.elmundo.sv/wp-content/uploads/2019/06/Polideportivo-UES.jpg" alt="">
      </div>
          <div class="layer">
            <h1>polideportivo.</h1>
            <p>Un bonito lugar para hacer ejercicio.</p>
          </div>
        </div>
        <div class="slide">
        <div class="bg">
          <img src="https://biblioteca.ues.edu.sv/wp-content/uploads/sites/19/2020/07/Entrada_de_la_Biblioteca_Central_de_la_Universidad_de_El_Salvador.jpg" alt="">
        </div>
          <div class="layer">
            <h1>Biblioteca.</h1>
            <p>Un gran lugar para descurbrir nuevas perspectivas.</p>
          </div>
      </div>
        <div class="slide">
          <div class="bg">
            <img src="https://lh3.googleusercontent.com/p/AF1QipOeDpZo9MrOpYKw8wlb7RJPRbSV6FezTaoFGyQ=s1600-w400" alt="">
        </div>
          <div class="layer">
            <h1>Teatro UES.</h1>
            <p>vitae dignissim turpis. Suspendisse vitae ornare urna. Ut sollicitudin sem ut arcu pulvinar dictum. Pellentesque mattis finibus ultricies.</p>
          </div>
      </div>
        <div class="slide">
          <div class="bg">
            <img src="https://eluniversitario.ues.edu.sv/wp-content/uploads/sites/11/2020/11/foto-ING-1024x683.jpg" alt="">
          </div>
            <div class="layer">
              <h1>Areas verdes.</h1>
              <p>vitae dignissim turpis. Suspendisse vitae ornare urna. Ut sollicitudin sem ut arcu pulvinar dictum. Pellentesque mattis finibus ultricies.</p>
            </div>
        </div>
          <div class="slide">
            <div class="bg">
            <img src="http://www.diariotrv.com/asset/thumbnail,1280,720,center,center//media/diariotrv/images/2017/12/23/Universidad-El-Salvador.jpg" alt="">
            </div>
            <div class="layer">
              <h1>Entrada</h1>
              <p>vitae dignissim turpis. Suspendisse vitae ornare urna. Ut sollicitudin sem ut arcu pulvinar dictum. Pellentesque mattis finibus ultricies.vitae dignissim turpis. Suspendisse vitae ornare urna. Ut sollicitudin sem ut arcu pulvinar dictum. Pellentesque mattis finibus ultricies
            </div>
        </div>
    </div>
</div>
<div class="py-2 colorGris my-4">
    <h1 class="textoSuavecito text-center text-light"><span >Mas Contenidos</span></h1>
    <h6 class="textoDuro text-center text-light"><span >Mas Conteidos</span></h6>
</div>
{{--FIN--}}
@endsection
