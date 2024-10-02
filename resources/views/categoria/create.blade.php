{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'Categorias')


{{--Definimos el contenido --}}
@section('content')
    <div class="container col-md-4">
        <h1>Crear</h1>
        <h5>Formulario para crear categorias</h5>
        <hr>

        <form action="/categoria/store" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nombre">
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                <label for="floatingInput">Nombre de la categoria</label>
            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-primary mb-3">Guardar</button>

            </div>
        </form>
    </div>
@endsection
