@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card shadow-sm">
              

                <div class="card-body">
                     
                <div class="col col-6 mx-auto">
                    <img class="img-fluid" src="{{asset('img/LogoSECRETARIADEPOSGRADO-02.svg')}}" alt="">
                    <h4 class="text-center mb-3 text-muted">Recuperar <strong> contraseña</strong></h4>  
                </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row col-8 mx-auto">
                            <label for="email" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Direccion de correo:') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-center">
                            <div class="">
                                   <button type="submit" class="botoncitoRojo">
                                    {{ __('Enviar link de reinicio') }}
                                </button>
                            </div>
                             
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
