@extends('layouts.app')

@section('title')Página {{ $reports["pagination"]["currentPage"] }} (Reportes Automáticos)@endsection

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    <strong>Página {{ $reports["pagination"]["currentPage"] }}</strong>
                </p>
            </blockquote>
        </div>

        <div class="col s6">
            <p class="grey-text text-darken-2 center">
                <i class="material-icons md-28 d-block">smart_toy</i>
                Reportes Automáticos
            </p>
        </div>
    </div>

    <table class="centered highlight">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($reports["reports"] as $report)
                <tr>
                    <td>{{ $report }}</td>
                    <td>
                        <a class="waves-effect waves-light btn-flat tooltipped" href="{{ route('automaticReport.show', $report) }}" data-position="bottom" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex flex-justify-center" style="flex-wrap:wrap;margin-top:30px">
        @php
            $pageLimit = 9;
            $pageRate = 0;
        @endphp

        @for ($page = $reports["pagination"]["currentPage"]; $page <= $reports["pagination"]["totalPages"]; $page++)
            @if ($page == $reports["pagination"]["currentPage"])
                @continue
            @endif

            <a class="waves-effect waves-light btn" href="{{ route('automaticReport.showPage', $page) }}">
                {{ $page }}
            </a>

            @if ($pageRate == $pageLimit)
                <a class="waves-effect waves-light btn disabled" href="#">...</a>

                @break
            @endif

            @php
                $pageRate++;
            @endphp
        @endfor
    </div>

    <p class="grey-text text-darken-2 center">
        Reportes Totales:

        <strong>
            {{ $reports["pagination"]["totalReports"] }}
        </strong>
    </p>
@endsection
