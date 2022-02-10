<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('img/favico/favicon.ico')}}">
    <title>Secretaría Posgrado | {{$subtitulo}}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('fonts/font-style.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper-bundle/swiper-bundle.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./style.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/swiper-bundle/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/scrollmagic/ScrollMagic.min.js') }}" defer></script>
    <script src="{{ asset('js/animationgsap/animation.gsap.min.js') }}" defer></script>
    <script src="{{ asset('js/tweenmax/TweenMax.min.js') }}" defer></script>
    <script src="{{ asset('js/mainFront.js') }}" defer></script>
</head>
    <body>
        <div id="loader-container">
            <div class="loader">
                <div class="spinner-grow text-primary" role="status"></div>
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark colorGris shadow-sm paddings sticky-top">
                <div class="container margenes">
                    @if(request()->routeIs('inicio'))
                        <a class="navbar-brand" href="{{ url('/') }}">
                         
                            <img class="float-start tamañoLogoLateral" src="{{asset('img/logolateral3.svg')}}">
                        </a>      
                    @endif      
                    @if (!request()->routeIs('inicio'))               
                        <a class="navbar-brand" href="{{ url('/') }}">
                          
                            <img class="float-start tamañoLogoLateral" src="{{asset('img/logolateral3.svg')}}">
                            
                        </a>          
                    @endif
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>       
                    {{--Nav de hamburguesa--}}
                    <div class="collapse navbar-collapse  nolist " id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        {{--<ul class="navbar-nav me-auto"></ul>--}}
                        @if(request()->routeIs('inicio'))
                            <ul class="navbar-nav ms-auto me-auto">
                                <!-- Authentication Links -->
                                <li class="nav-item  nolist">
                                    <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('inicio') ? 'activoNav' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('oferta') ? 'activoNav' : '' }}" href="{{ route('oferta') }}">Oferta Académica</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link  text-uppercase text-light elementoNav  {{ request()->routeIs('reseña','organos') ? 'activoNav' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                        Sobre Nosotros
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('reseña')}}">Reseña Historica</a>
                                        <a class="dropdown-item" href="{{route('organos')}}">Órganos de Gobierno</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('galeria')}}">Album de fotos</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('noticias') ? 'activoNav' : '' }}" href="{{ route('noticias') }}">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-light elementoNav  {{ request()->routeIs('investigaciones') ? 'activoNav' : '' }}" href="{{ route('investigaciones') }}">Investigaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('enlaces') ? 'activoNav' : '' }}" href="{{ route('enlaces') }}">Enlaces</a>
                                </li>
                               
                                {{--
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('preguntasFrecuentes') ? 'activoNav' : '' }}" href="{{ route('preguntasFrecuentes') }}">Preguntas frecuentes</a>
                                </li>--}}
                            </ul>
                        @endif   
                        <!-- Right Side Of Navbar -->
                        @if(!request()->routeIs('inicio'))
                        <ul class="navbar-nav ms-auto me-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item  nolist">
                                <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('inicio') ? 'activoNav' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('oferta','ofertaFacultad') ? 'activoNav' : '' }}" href="{{ route('oferta') }}">Oferta Académica</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  text-uppercase text-light elementoNav  {{ request()->routeIs('reseña','organos') ? 'activoNav' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    Sobre Nosotros
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('reseña')}}">Reseña Historica</a>
                                    <a class="dropdown-item" href="{{route('organos')}}">Órganos de Gobierno</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('galeria')}}">Album de fotos</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('noticias') ? 'activoNav' : '' }}" href="{{ route('noticias') }}">Noticias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-light elementoNav  {{ request()->routeIs('investigaciones') ? 'activoNav' : '' }}" href="{{ route('investigaciones') }}">Investigaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('enlaces') ? 'activoNav' : '' }}" href="{{ route('enlaces') }}">Enlaces</a>
                            </li>
                           
                                {{--
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-light elementoNav {{ request()->routeIs('preguntasFrecuentes') ? 'activoNav' : '' }}" href="{{ route('preguntasFrecuentes') }}">Preguntas frecuentes</a>
                            </li>--}}
                        </ul>
                        @endif  
                    </div>
                </div>
                 <div class="catalogoIcono d-none">
                <a  href="{{route('catalogoC')}}">
                    <img class="img-fluid" src="{{asset('img/catalogo/CATALOGOROJO.svg')}}" alt="">
                </a>
                </div>
                <div class="catalogoIcono">
                   
                    <a href="{{route('catalogoC')}}" target="_blank" class="btn btn-danger text-light">Catálogo 2022</a>
                    
                </div>
            </nav>
           
            <main class="">
                @yield('content')
            </main>
        </div>
        {{--Inicio footer--}}
        <footer class="section footer-classic text-light colorRojo">
            <div class="container pt-3 pb-3">
                <div class="row row-30">
                    <div class="col-md-2">
                        <div class="pr-xl-4">
                            <a class="brand" href="index.html"><img class="brand-logo-light"  src="{{asset('img/ues_logo3.svg')}}" alt="" width="80"  srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="lh-sm">  2021 Universidad de El Salvador.</li>
                            <li class="lh-sm"> Ciudad Universitaria "Dr. Fabio Castillo Figueroa",</li>
                            <li class="lh-sm"> Final de Av.Mártires y Héroes del 30 julio, San Salvador,</li>
                            <li class="lh-sm"> El Salvador, América Central. Teléfonos: +(503) 2511-2000. Todos los derechos reservados.</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled mb-0">
                            <li class="lh-sm"> Secretaría de Posgrado.</li>
                            <li class="lh-sm"> Contacto: +(503) 2511-2000 ext. 3084/2046.</li>
                            
                            <li class="lh-sm"> Universidad de El Salvador</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        {{--Fin footer--}}
        <script  src="{{ asset('js/loader.js') }}"></script>
    </body>
</html>
