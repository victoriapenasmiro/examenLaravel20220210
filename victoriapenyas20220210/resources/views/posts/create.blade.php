@extends('layouts.base')
@section('title', 'Nuevo Post')

{{-- @section('idiomas')

    @php
        $other_lang = $lang == 'es' ? 'en' : 'es';
    @endphp

    ¡Cambia el idioma!
    <a href={{ route('centros.create', $other_lang) }}>{{ Str::upper($other_lang) }}</a>

@endsection --}}

@section('content')

    <h1>{{ __('posts.crear') }}</h1>
    <form action="{{ route('posts.store', $lang) }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        <div class="form-group row">
            <label for="titulo" class="col-sm-2 col-form-label">{{ __('posts.titulo') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titulo" name="titulo"
                    placeholder="{{ __('posts.titulo_ingresa') }}" value="{{ old('titulo') }}">
                @error('titulo')
                    <small class="text-danger">*{{ "$message" }}</small>
                @enderror
            </div>
        </div>

    </form>

@endsection
