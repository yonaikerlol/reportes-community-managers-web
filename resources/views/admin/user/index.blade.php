@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="row d-flex flex-align-center flex-justify-center">
        <div class="col s6">
            <blockquote>
                <p class="center flow-text">
                    Aquí puedes administrar los usuarios registrados.
                </p>

                <div class="center grey-text text-darken-2">
                    Usuarios: <strong>{{ $usersCount }}</strong>
                </div>
            </blockquote>
        </div>

        <div class="col s6">
            <img src="{{ asset('img/users.png') }}" alt="Usuarios" class="block-center rounded" />
        </div>
    </div>

    <br /> <br />

    <div class="row">
        <div class="col s12 center">
            <a class="waves-effect waves-light btn" href="{{ route('admin.users.create') }}">
                <i class="material-icons left">add</i>
                Añadir
            </a>
        </div>
    </div>

    <table class="centered highlight">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Administrador</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->admin ? "Sí" : "No" }}</td>
                    <td>
                        <a class="waves-effect waves-light btn-flat tooltipped" data-position="bottom" data-tooltip="Eliminar" href="{{ route('admin.users.delete', $user) }}">
                            <i class="material-icons">delete</i>
                        </a>
                        <a class="waves-effect waves-light btn-flat tooltipped" data-position="bottom" data-tooltip="Editar" href="{{ route('admin.users.edit', $user) }}">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
