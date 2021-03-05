@extends('layouts.app')

@section('title', 'Cambiar Contraseña')

@section('content')
    <h1 class="flow-text center">Cambiar Contraseña</h1>

    <div class="row">
        <form class="col s12" action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}" />

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
                    <input id="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}" name="password" type="password" value="{{ old('password') }}" required autocomplete="new-password" />
                    <label for="password">Contraseña</label>

                    @if ($errors->has('password'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="password_confirmation" class="validate {{ $errors->has('password_confirmation') ? 'invalid' : '' }}" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required autocomplete="new-password" />
                    <label for="password_confirmation">Repetir Contraseña</label>

                    @if ($errors->has('password_confirmation'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="col s12 center">
                    <button class="waves-effect waves-light btn" type="submit">
                        <i class="material-icons left">send</i>
                        Cambiar Contraseña
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
