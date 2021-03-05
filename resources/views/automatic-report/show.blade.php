@extends('layouts.app')

@section('title')Reporte del {{ $reportDate }}@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dist/automatic-report.css') }}" />
@endsection

@section('content')
    <h3 class="center">Reporte del {{ $reportDate }}</h3>

    <div class="row">
        <div class="col s12 m4">
            <p class="center grey-text text-darken-2">
                <i class="material-icons md-28 d-block">smart_toy</i>
                Reporte Automático
            </p>
        </div>

        <div class="col s12 m4">
            <p class="center grey-text text-darken-2">
                <i class="material-icons d-block">calendar_today</i>
                Semana: {{ $report->weekOfMonth }}
            </p>
        </div>

        <div class="col s12 m4">
            <p class="center grey-text text-darken-2">
                <i class="material-icons d-block">article</i>
                Generado: {{ $report->generatedAt }}
            </p>
        </div>
    </div>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header">Plataformas</div>
            <div class="collapsible-body">
                <table class="centered striped">
                    <thead>
                        <tr>
                            <th>Plataforma</th>
                            <th>Cuentas Totales</th>
                            <th>Cuentas Bloqueadas</th>
                            <th>Cuentas Activas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($report->accounts as $platform)
                            <tr>
                                <td>{{ $platform->platform }}</td>
                                <td>{{ $platform->counts->total }}</td>
                                <td>{{ $platform->counts->blocked }}</td>
                                <td>{{ $platform->counts->active }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </li>

        <li>
            <div class="collapsible-header">Administradores</div>
            <div class="collapsible-body">
                <table class="centered striped">
                    <thead>
                        <tr>
                            <th>Administrador</th>
                            <th>Cuentas Totales</th>
                            <th>Cuentas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($report->administrators as $administrator)
                            <tr>
                                <td>{{ $administrator->administrator }}</td>
                                <td>{{ $administrator->accounts->totalCount }}</td>
                                <td>
                                    <ul class="collection">
                                        @foreach ($administrator->accounts->byPlatform as $account)
                                            <li class="collection-item">
                                                {{ $account->platform }}: {{ $account->count }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </li>

        @foreach ($report->accounts as $platform)
            <li>
                <div class="collapsible-header">Cuentas de {{ $platform->platform }}</div>
                <div class="collapsible-body">
                    @switch ($platform->platform)
                        @case("Instagram")
                            <table class="centered striped">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Administrador</th>
                                        <th>Foto</th>
                                        <th>Datos</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($platform->accounts as $account)
                                        <tr>
                                            <td>
                                                <a href="https://www.instagram.com/<?= str_replace(
                                                    "@",
                                                    "",
                                                    $account->username
                                                ) ?>/">
                                                    {{ $account->username }}
                                                </a>
                                            </td>
                                            <td>{{ $account->administrator }}</td>
                                            @if ($account->status === "active")
                                                <td>
                                                    <img
                                                        class="profile-photo lazy"
                                                        data-src="{{ $account->data->profilePhoto }}"
                                                        alt="Foto de Perfil"
                                                    />
                                                </td>
                                                <td>
                                                    <ul class="collection">
                                                        <li>
                                                            Seguidores: {{ $account->data->followersCount }}
                                                        </li>
                                                        <li>
                                                            Siguiendo: {{ $account->data->followingCount }}
                                                        </li>
                                                        <li>
                                                            Publicaciones: {{ $account->data->feedItemsCount }}
                                                        </li>
                                                    </ul>
                                                </td>
                                            @else
                                                <td></td>
                                                <td>CUENTA BLOQUEADA</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @break

                        @case("Twitter")
                            <table class="centered striped">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Administrador</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($platform->accounts as $account)
                                        <tr>
                                            <td>
                                                <a href="https://twitter.com/<?= str_replace(
                                                    "@",
                                                    "",
                                                    $account->username
                                                ) ?>">
                                                    {{ $account->username }}
                                                </a>
                                            </td>
                                            <td>{{ $account->administrator }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @break

                        @default
                            <table class="centered striped">
                                <thead>
                                    <tr>
                                        <th>Cuenta</th>
                                        <th>Administrador</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($platform->accounts as $account)
                                        <tr>
                                            <td>{{ $account->username }}</td>
                                            <td>{{ $account->administrator }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    @endswitch
                </div>
            </li>
        @endforeach
    </ul>
@endsection

@section('body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.3.1/lazyload.min.js" integrity="sha512-lVcnjCLGjJTaZU55wD7H3f8SJVi6VV5cQRcmGuYcyIY607N/rzZGEl90lNgsiEhKygATryG/i6e5u2moDFs5kQ==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dist/lazyload.js') }}"></script>
@endsection
