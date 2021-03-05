@extends('layouts.app')

@section('title', 'Eliminar reporte')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    ¿Estás seguro de <strong>eliminar</strong> este reporte?
                    <br /> <br />

                    <em>"{{ $report->name }}"</em>
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/delete.png') }}" alt="Eliminar" class="block-center rounded" />
        </div>
    </div>


    <div class="row">
        <form class="col s12" action="{{ route('admin.reports.destroy', $report) }}" method="POST">
            @csrf

            <div class="row">
                <div class="center col s12 m6">
                    <button class="waves-effect waves-light btn-large red" type="submit" style="width:100%">
                        <i class="material-icons left">delete</i>
                        Eliminar
                    </button>
                </div>

                <div class="center col s12 m6">
                    <a class="waves-effect waves-light btn-large blue" style="width:100%" href="{{ route('admin.reports.index') }}">
                        <i class="material-icons left">cancel</i>
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
