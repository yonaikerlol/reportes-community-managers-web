@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <h1 class="flow-text center">Crear Usuario</h1>

    <div class="row">
        <form class="col s12" action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">badge</i>
                    <input id="first_name" class="validate {{ $errors->has('first_name') ? 'invalid' : '' }}" value="{{ old('first_name') }}" type="text" name="first_name" required autofocus autocomplete="given-name" />
                    <label for="first_name">Nombre</label>

                    @if ($errors->has('first_name'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">badge</i>
                    <input id="last_name" class="validate {{ $errors->has('last_name') ? 'invalid' : '' }}" value="{{ old('last_name') }}" type="text" name="last_name" required autocomplete="family-name" />
                    <label for="last_name">Apellido</label>

                    @if ($errors->has('last_name'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" class="validate {{ $errors->has('email') ? 'invalid' : '' }}" value="{{ old('email') }}" type="email" name="email" required autocomplete="email" />
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
                    <label>
                        <input type="checkbox" name="admin" class="filled-in" {{ old('admin') ? 'checked' : '' }} />
                        <span>Administrador</span>
                    </label>
                </div>

                <div class="col s12 m6 center">
                    <button class="waves-effect waves-light btn-large blue" type="submit" style="width:100%">
                        <i class="material-icons left">send</i>
                        Guardar
                    </button>
                </div>

                <div class="col s12 m6 center">
                    <button class="waves-effect waves-light btn-large red" type="reset" style="width:100%">
                        <i class="material-icons left">cancel</i>
                        Reiniciar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
