@extends('layouts.app')

@section('title', 'Inicio')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dist/home.css') }}" />
@endsection

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    Bienvenido al sitio de <strong>Reportes de Community Manager's</strong> del Partido COPEI.
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/reporte.png') }}" alt="Reporte" class="block-center rounded" />
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s6">
                    <a href="#reportes-manuales">
                        <i class="material-icons">person</i>
                        Reportes Manuales
                    </a>
                </li>
                <li class="tab col s6">
                    <a href="#reportes-automaticos">
                        Reportes Automáticos
                        <i class="material-icons">smart_toy</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="reportes-manuales" class="col s12">
        <table class="centered highlight">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Escritor</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($manualReports as $report)
                    <tr>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->user->full_name }}</td>
                        <td>
                            <a class="waves-effect waves-light btn-flat tooltipped" href="{{ route('manualReport.show', $report) }}" data-position="bottom" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="reportes-automaticos" class="col s12">
        <table class="centered highlight">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($automaticReports as $report)
                    <tr>
                        <td>{{ $report }}</td>
                        <td>
                            <a class="waves-effect waves-light btn-flat tooltipped" href="{{ route('automaticReport.show', $report) }}" data-position="bottom" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
