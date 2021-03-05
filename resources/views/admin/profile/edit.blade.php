@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    Perfil
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/profile.png') }}" alt="Perfil" class="block-center rounded" />
        </div>
    </div>

    <br /> <br />

    <div class="row">
        <form class="col s12" action="{{ route('admin.profile.update') }}" method="POST">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">badge</i>
                    <input id="first_name" class="validate {{ $errors->has('first_name') ? 'invalid' : '' }}" value="{{ Auth::user()->first_name }}" type="text" name="first_name" required autofocus autocomplete="given-name" />
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
                    <input id="last_name" class="validate {{ $errors->has('last_name') ? 'invalid' : '' }}" value="{{ Auth::user()->last_name }}" type="text" name="last_name" required autocomplete="family-name" />
                    <label for="last_name">Apellido</label>

                    @if ($errors->has('last_name'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="col s12 m6 center">
                    <button type="submit" class="waves-effect waves-light btn-large blue" style="width:100%">
                        <i class="material-icons left">send</i>
                        Enviar
                    </button>
                </div>

                <div class="col s12 m6 center">
                    <a class="waves-effect waves-light btn-large" href="{{ route('admin.profile.change-password') }}" style="width:100%">
                        <i class="material-icons left">vpn_key</i>
                        Cambiar Contraseña
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
