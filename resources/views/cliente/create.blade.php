{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'Cliente')


{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Crear</h1>
    <h5>Formulario para crear clientes</h5>
    <hr>

    <form action="/cliente/store" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nombre">
            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="edad" name="edad">
            @error('edad')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <label for="floatingPassword">Edad</label>
        </div><br>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="categoria" id="">

               @foreach ($categorias as $item)
                <option value="{{$item->codigo}}">{{$item->nombre}}</option>
               @endforeach
            </select>
            @error('categoria')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <label for="floatingSelect">Seleccione una Categoria</label>
        </div> <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-3">Guardar</button>

        </div>
    </form>
</div>
@endsection
