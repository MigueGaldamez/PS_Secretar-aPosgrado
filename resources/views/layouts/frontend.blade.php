<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if(Route::has('inicio'))
            <nav class="navbar navbar-expand-md navbar-dark colorGris shadow-sm paddings sticky-top">
        @else
            <nav class="navbar navbar-expand-md navbar-dark colorGris shadow-sm paddings sticky-top">
        @endif
        
            <div class="container margenes">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="row">
                        <div class="col">
                            <img class="rounded float-start tamañoLogo" src="{{asset('img/logoRedondoBlanco.svg')}}">
                        </div>
                        <div class="col">
                            <ul class="list-unstyled mb-0 pt-1">
                                <li class="lh-sm">  <b>Secretaría de</b></li>
                                <li class="lh-sm"> Posgrado</li>
                            </ul>
                        </div>

                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                       
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ route('login') }}">Inicio</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase text-light" href="{{ route('login') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sobre Nosotros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ route('login') }}">Noticias y Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ route('login') }}">Investigaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ route('login') }}">Enlaces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ route('login') }}">Preguntas frecuentes</a>
                        </li>
                    </ul>
                </div>
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
             <div class="col-md-7">
                <ul class="list-unstyled mb-0">
                    <li class="lh-sm">  2021 Universidad de El Salvador.</li>
                    <li class="lh-sm"> Ciudad Universitaria "Dr. Fabio Castillo Figueroa",</li>

                    <li class="lh-sm"> Final de Av.Mártires y Héroes del 30 julio, San Salvador,</li>
                    <li class="lh-sm"> El Salvador, América Central. Teléfonos: +(503) 2511-2000. Todos los derechos reservados.</li>

                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled mb-0">
                    <li class="lh-sm"> Secretaría de Posgrado.</li>
                    <li class="lh-sm"> Universidad de El Salvador</li>
                </ul>
            </div>
          </div>
        </div>
      
      </footer>
    {{--Fin footer--}}
</body>
</html>
