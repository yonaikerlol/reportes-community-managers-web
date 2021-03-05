@extends('layouts.app')

@section('title', 'Crear Reporte')

@section('content')
    <h1 class="flow-text center">Crear Reporte</h1>

    <div class="row">
        <form class="col s12" action="{{ route('admin.reports.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">rate_review</i>
                    <input id="name" class="validate {{ $errors->has('name') ? 'invalid' : '' }}" value="{{ old('name') }}" type="text" name="name" required autofocus />
                    <label for="name">Nombre</label>

                    @if ($errors->has('name'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="col s12">
                    <textarea id="content" name="content" placeholder="Escriba aquí su Reporte">
                        {{ old('content') }}
                    </textarea>

                    @if ($errors->has('content'))
                        <div class="col s12">
                            <span class="red-text">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="col s12 m6 center">
                    <button class="waves-effect waves-light btn-large blue" type="submit" style="width:100%">
                        <i class="material-icons left">send</i>
                        Guardar
                    </button>
                </div>

                <div class="col s12 m6 center">
                    <button class="waves-effect waves-light btn-large red" type="reset" style="width:100%">
                        <i class="material-icons left">cancel</i>
                        Reiniciar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('body')
    <script src="{{ asset('js/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/dist/ckeditor.js') }}"></script>
@endsection
