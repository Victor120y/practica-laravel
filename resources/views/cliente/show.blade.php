{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'cliente')


{{--Definimos el contenido --}}
@section('content')
    <h1>Clientes</h1>
    <h5>Listado de Cliente </h5>
    <hr>
    <div class="container">
    <a class="btn btn-danger btn-sm" href="/cliente/create">Agregar Clientes nuevo</a>
    <table class="table table-hover caption-top table-responsive">
        <caption>Lista de Clientes</caption>
            <thead class="table-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{--listado de productos--}}
            @foreach ($clientes as $item)
            <tr>
                <th scope="row">{{$item->codigo }}</th>
                <td>{{$item->nombre }}</td>
                <td>{{$item->edad }}</td>
                <td>{{$item->categoria }}</td>

                <td>
                    <a class="btn btn-success btn-sm" href="/cliente/edit/{{$item->codigo}}">Modificar</a>
                    <button class="btn btn-danger btn-sm" url="/cliente/destroy/{{$item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    </div>

@endsection

@section('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/product.js') }}"></script>
@endsection
