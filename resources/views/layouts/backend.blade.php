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
      <script src="{{ asset('js/mainBack.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/styleBack.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app" class="wrapper">
       
      <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse h-100">
            <div class="position-sticky px-3 pb-3  text-white bg-dark">
                <a href="/" class="align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Area Administrativa</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                     <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" >
                        Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{route('Informacion')}}" class="nav-link text-white {{ request()->routeIs('Informacion') ? 'active' : '' }}" >
                        Información de la Secretaría
                        </a>
                    </li>
                    <li>
                        <a href="{{route('Facultades')}}" class="nav-link text-white {{ request()->routeIs('Facultades') ? 'active' : '' }}" >
                        Facultades
                        </a>
                    </li>
                    <li>
                        <a href="{{route('Enlaces')}}" class="nav-link text-white {{ request()->routeIs('Enlaces') ? 'active' : '' }}" >
                        Enlaces
                        </a>
                    </li>
                </ul>

                  <hr>
                <div class="dropdown">
                    <a href="#" class="text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://avatars.githubusercontent.com/u/25284452?v=4" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>Puede servir</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
            
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm bg mt-2 sticky-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                      <a class="navbar-brand" href="{{ url('/') }}">
                            Secretaría de Pogrado UES
                        </a>
                       
                    </ul>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="my-4">
        @yield('content');
        </div>
        </main>

        </div>
        </div>
     
         
            
            
        

       
    </div>
   </body>
</html>
