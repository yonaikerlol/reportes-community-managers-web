@extends('layouts.app')

@section('title', 'Página no encontrada')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center grey-text text-darken-2 flow-text">
                    No se ha encontrado la página que buscas.
                    <br /> <br />

                    Puedes volver a la página anterior o visitar nuestra página de inicio.
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/404.png') }}" alt="Página no encontrada" class="block-center rounded" />
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 center">
            <a class="waves-effect waves-light btn-large" style="width:100%" href="{{ route('home') }}">
                <i class="material-icons left">home</i>
                Inicio
            </a>
        </div>

        <div class="col s12 m6 center">
            <a class="waves-effect waves-light btn-large" style="width:100%" href="javascript:history.back()">
                <i class="material-icons left">arrow_back</i>
                Página anterior
            </a>
        </div>
    </div>
@endsection
