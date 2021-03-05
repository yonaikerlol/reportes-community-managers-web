@extends('layouts.app')

@section('title'){{ $report->name }}@endsection

@section('content')
    <div class="row">
        <div class="col s12 {{ $report->updated_at != $report->created_at ? 'm8' : '' }}">
            <h3 class="center">
                {{ $report->name }}
            </h3>

            <div class="row">
                <div class="col s6">
                    <p class="center grey-text text-darken-2">
                        <i class="material-icons md-28 d-block">article</i>
                        Reporte Manual
                    </p>
                </div>

                <div class="col s6">
                    <p class="center grey-text text-darken-2">
                        <i class="material-icons md-28 d-block">person</i>
                        Escrito por
                        <strong>
                            {{ $report->user->full_name }}
                        </strong>
                    </p>
                </div>
            </div>
        </div>

        @if ($report->updated_at != $report->created_at)
            <div class="col s12 m4">
                <blockquote>
                    Ultima actualización:
                    <strong>
                        <time datetime="{{ $report->updated_at }}">
                            {{ $report->updated_at->diffForHumans() }}
                        </time>
                    </strong>
                </blockquote>
            </div>
        @endif
    </div>

    <div class="browser-default">
        {!! $report->content !!}
    </div>

    @auth
        @if (Auth::user()->id === $report->user_id)
            <div class="row">
                <div class="col s12 m6 center">
                    <a class="waves-effect waves-light btn-large blue" href="{{ route('admin.reports.edit', $report) }}" style="width:100%">
                        <i class="material-icons left">edit</i>
                        Editar
                    </a>
                </div>

                <div class="col s12 m6 center">
                    <a class="waves-effect waves-light btn-large red" href="{{ route('admin.reports.delete', $report) }}" style="width:100%">
                        <i class="material-icons left">delete</i>
                        Eliminar
                    </a>
                </div>
            </div>
        @endif
    @endauth
@endsection
