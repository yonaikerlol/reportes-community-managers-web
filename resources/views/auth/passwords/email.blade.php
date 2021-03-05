@extends('layouts.app')

@section('title', '¿Olvidaste tú contraseña?')

@section('content')
    <h1 class="flow-text center">¿Olvidaste tú contraseña?</h1>

    <div class="row">
        <form class="col s12" action="{{ route('password.email') }}" method="POST">
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

                <div class="col s12 center">
                    <button class="waves-effect waves-light btn" type="submit">
                        <i class="material-icons left">send</i>
                        Enviar correo de recuperación
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
