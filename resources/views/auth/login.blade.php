@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    <strong>Iniciar sesión</strong>
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/login.png') }}" alt="Iniciar sesión" class="block-center rounded" />
        </div>
    </div>


    <div class="row">
        <form class="col s12" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" class="validate {{ $errors->has('email') ? 'invalid' : '' }}" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" />
                    <label for="email">Correo</label>

                    @if ($errors->has('email'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}" name="password" type="password" value="{{ old('password') }}" required autocomplete="current-password" />
                    <label for="password">Contraseña</label>

                    @if ($errors->has('password'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="col s12 center">
                    <a href="{{ route('password.request') }}">
                        <i class="material-icons left"></i>
                        ¿Olvidaste tú contraseña?
                    </a>
                </div>

                <div class="col s12 center">
                    <button class="waves-effect waves-light btn" type="submit">
                        <i class="material-icons left">send</i>
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
