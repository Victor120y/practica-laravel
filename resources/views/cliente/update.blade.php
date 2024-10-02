{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'cliente')


{{--Definimos el contenido --}}
@section('content')
    <h1>Modificar</h1>
    <h5>Formulario para modificar Cliente</h5>
    <hr>

    <form action="/cliente/update/{{$cliente->codigo}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <dic class="col-6">
                    Nombre
                    <input type="text" class="form-control" name="nombre" value="{{ $cliente->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dic>
                <dic class="col-6">
                    Edad
                    <input type="text" class="form-control" name="edad" value="{{ $cliente->edad }}">
                    @error('edad')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dic>
                <dic class="col-12">
                    Categoria
                    <select name="categoria" id="" class="form-control">
                        @foreach ($categorias as $item)
                            <option value="{{ $item->codigo }}"{{ (($item->codigo==$cliente->categoria)?'selected':'') }}>{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dic>
                <div class="col-12 mt-2">
                        <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
@endsection
