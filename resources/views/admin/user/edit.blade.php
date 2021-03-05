@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
    <h1 class="flow-text center">Editar Usuario</h1>

    <div class="row">
        <form class="col s12" action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input type="text" id="first_name" class="validate {{ $errors->has('first_name') ? 'invalid' : '' }}" value="{{ $user->first_name }}" name="first_name" required autofocus />
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
                    <i class="material-icons prefix">person</i>
                    <input type="text" id="last_name" class="validate {{ $errors->has('last_name') ? 'invalid' : '' }}" value="{{ $user->last_name }}" name="last_name" required autofocus />
                    <label for="last_name">Apellido</label>

                    @if ($errors->has('last_name'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('last_name') }}</strong>
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
                    <a class="waves-effect waves-light btn-large" href="{{ route('admin.users.change-password', $user) }}" type="reset" style="width:100%">
                        <i class="material-icons left">vpn_key</i>
                        Cambiar Contraseña
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
