@extends('layouts.app')

@section('title', 'Cambiar Contraseña')

@section('content')
    <h1 class="flow-text center">Cambiar contraseña</h1>

    <div class="row">
        <form class="col s12" action="{{ route('admin.profile.update-password') }}" method="post">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="old_password" class="validate {{ $errors->has('old_password') ? 'invalid' : '' }}" name="old_password" type="password" value="{{ old('old_password') }}" required autofocus autocomplete="current-password" />
                    <label for="old_password">Contraseña Actual</label>

                    @if ($errors->has('old_password'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}" name="password" type="password" value="{{ old('password') }}" required autocomplete="new-password" />
                    <label for="password">Nueva Contraseña</label>

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
                        Enviar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
