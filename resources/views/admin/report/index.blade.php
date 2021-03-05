@extends('layouts.app')

@section('title', 'Reportes (Panel de Control)')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    Aquí puedes administrar tus Reportes.
                </p>

                <div class="center grey-text text-darken-2">
                    Publicados: <strong>{{ $reportsCount }}</strong>
                </div>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/reporte-2.png') }}" alt="Reporte" class="block-center rounded" />
        </div>
    </div>

    <br /> <br />

    <div class="row">
        <div class="col s12 center">
            <a class="waves-effect waves-light btn" href="{{ route('admin.reports.create') }}">
                <i class="material-icons left">add</i>
                Añadir
            </a>
        </div>
    </div>

    <table class="centered highlight">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Creado</th>
                <th>Ultima actualización</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td><strong>{{ $report->name }}</strong></td>
                    <td>
                        <span class="grey-text text-darken-2">
                            <time datetime="{{ $report->created_at }}">
                                {{ $report->created_at->diffForHumans() }}
                            </time>
                        </span>
                    </td>
                    <td>
                        <span class="grey-text text-darken-2">
                            <time datetime="{{ $report->updated_at }}">
                                {{ $report->updated_at->diffForHumans() }}
                            </time>
                        </span>
                    </td>
                    <td>
                        <a class="waves-effect waves-light btn-flat tooltipped" data-position="bottom" data-tooltip="Eliminar" href="{{ route('admin.reports.delete', $report) }}">
                            <i class="material-icons">delete</i>
                        </a>
                        <a class="waves-effect waves-light btn-flat tooltipped" data-position="bottom" data-tooltip="Editar" href="{{ route('admin.reports.edit', $report) }}">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
