@extends('layouts.app')
@section('title', 'Productos')
@section('content')

    <div class="container col-md-4">
        <h1>Crear</h1>
        <h5>Formulario para crear productos</h5>
        <hr>

        <form action="/products/store" method="post">
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
                <input type="text" class="form-control" id="floatingPassword" placeholder="Precio" name="precio">
                @error('precio')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                <label for="floatingPassword">Precio</label>
            </div><br>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="marca" id="">
                   <!-- <option selected>abrir la lista de seleccion del menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                   -->
                   @foreach ($marcas as $item)
                    <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                   @endforeach
                </select>
                @error('marca')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                <label for="floatingSelect">Seleccione una marca</label>
            </div> <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mb-3">Guardar</button>

            </div>
        </form>
    </div>
@endsection


