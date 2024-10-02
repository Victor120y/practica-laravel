{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'Productos')


{{-- Definimos el contenido --}}
@section('content')
    <h1>Modificar</h1>
    <h5>Formulario para modificar Productos</h5>
    <hr>

    <div class="container">
        <form action="/products/update/{{$producto->codigo}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <dic class="col-6">
                    Nombre
                    <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dic>
                <dic class="col-6">
                    Precio
                    <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}">
                    @error('precio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dic>
                <dic class="col-12">
                    Marca
                    <select name="marca" id="" class="form-control">
                        @foreach ($marcas as $item)
                            <option value="{{ $item->codigo }}"{{ (($item->codigo==$producto->marca)?'selected':'') }}>{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('marca')
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
    </div>
@endsection
