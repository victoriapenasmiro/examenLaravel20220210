@extends('layouts.base')
@section('title', 'Nuevo Post')

@section('idiomas')

    @php
    $other_lang = $lang == 'es' ? 'en' : 'es';
    @endphp

    ¡Cambia el idioma!
    <a href={{ route('posts.create', $other_lang) }}>{{ Str::upper($other_lang) }}</a>

@endsection

@section('content')

    <h1 class="mb-5 text-center">{{ __('posts.crear') }}</h1>

        {{-- warning de errores de validacion del formulario --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store', $lang) }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        <div class="form-group row">
            <label for="titulo" class="col-12 col-form-label">{{ __('posts.titulo') }}</label>
            <div class="col-12">
                <input type="text" class="form-control" id="titulo" name="titulo"
                    placeholder="{{ __('posts.titulo_ingresar') }}" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <small class="text-danger">*{{ "$message" }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="extracto" class="col-12 col-form-label">{{ __('posts.extracto') }}</label>
            <div class="col-12">
                <textarea class="form-control" id="extracto" name="extracto"
                    placeholder="{{ __('posts.extracto_ingresar') }}">{{ old('extracto') }}</textarea>
                @error('extracto')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="contenido" class="col-12 col-form-label">{{ __('posts.contenido') }}</label>
            <div class="col-12">
                <textarea class="form-control" id="contenido" name="contenido" rows="6"
                    placeholder="{{ __('posts.contenido_ingresar') }}" required>{{ old('contenido') }}</textarea>
                @error('contenido')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="comentable" name="comentable" required value="1"
                        {{ old('comentable') ? 'checked' : '' }}>
                    <label class="form-check-label" for="comentable">
                        @lang('posts.comentable')
                    </label>
                </div>
                @error('comentable')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="caducable" name="caducable" required value="1"
                        {{ old('caducable') ? 'checked' : '' }}>
                    <label class="form-check-label" for="caducable">
                        @lang('posts.caducable')
                    </label>
                </div>
                @error('caducable')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="acceso">{{ __('acceso') }}</label>
            <select class="form-control" id="acceso" name="acceso" required>

                <option value="privado" {{ old('acceso') == 'privado' ? 'selected' : '' }}>
                    {{ __('privado') }}
                </option>

                <option value="publico" {{ old('acceso') == 'publico' ? 'selected' : '' }}>
                    {{ __('publico') }}
                </option>

            </select>
            @error('acceso')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group row">
            <label for="fec_publicacion" class="col-sm-2 col-form-label">@lang('fec_publicacion')</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fec_publicacion" name="fec_publicacion"
                    value="{{ old('fec_publicacion') }}" placeholder="@lang('fec_publicacion')" required>
                @error('fec_publicacion')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success">{{ __('crear') }}</button>
            </div>
        </div>

    </form>

@endsection
