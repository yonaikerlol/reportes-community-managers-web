@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6 center">
            <blockquote>
                <p class="grey-text text-darken-2 flow-text">
                    Bienvenido al Panel de Control,
                    <br /> <br />

                    <strong>{{ Auth::user()->full_name }}</strong>.
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/dashboard.png') }}" alt="Panel de Control" class="block-center rounded" />
        </div>
    </div>

    <br /> <br />

    <div class="row">
        <div class="col s12 m6 center">
            <a class="waves-effect waves-light btn-large" style="width:100%" href="{{ route('admin.reports.index') }}">
                <i class="material-icons left">description</i>
                Reportes
            </a>
        </div>

        <div class="col s12 m6 center">
            <a class="waves-effect waves-light btn-large" style="width:100%" href="{{ route('admin.profile.edit') }}">
                <i class="material-icons left">person</i>
                Perfil
            </a>
        </div>

        @if (Auth::user()->isAdmin())
            <div class="col s12 center">
                <a class="waves-effect waves-light btn-large" style="width:100%" href="{{ route('admin.users.index') }}">
                    <i class="material-icons left">people</i>
                    Usuarios
                </a>
            </div>
        @endif
    </div>
@endsection
