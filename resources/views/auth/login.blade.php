@extends('layouts.app')

@section('content')
<div class="container">
    
</div>
<div class="container mt-4 InicioSesion">
  <div class="session">
    <div class="left">
      
    </div>
    <form  method="POST" action="{{ route('login') }}" class="log-in" autocomplete="off"> 
           @csrf
<img class="img-fluid mb-2" src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="">
      {{--<h1>Secretaría de <span>Posgrado</span></h1>--}}
      <p>Bienvenid@, este apartado del sitio es privado asi que si has llegado aqui por error te recomendamos regresar al inicio.</p>
      
      <div class="floating-label">
        <input placeholder="Correo" class="@error('email') is-invalid @enderror" type="email" name="email" id="email" autocomplete="email" required  value="{{ old('email') }}" >
        <label for="email">Correo:</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="icon">
        <i class="far fa-envelope icoo fa-2x"></i>
        </div>
      </div>
      <div class="floating-label">
        <input placeholder="Contraseña" type="password" name="password" id="password" autocomplete="off" class="@error('password') is-invalid @enderror">
        <label for="password">Contraseña:</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="icon">
          
         <span> <i class="fas fa-key icoo fa-2x"></i></span>
        </div>
        
      </div>
      <div>
       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Recordarme') }}
        </label>
      </div>
        <div class="col-md-8 offset-md-4">
                             

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('¿Olvidó su contraseña?') }}
                </a>
            @endif
        </div>
      <button type="submit">Iniciar Sesións</button>
     
    </form>
  </div>
</div>
@endsection
