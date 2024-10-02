{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'Productos')


{{-- Definimos el contenido --}}
@section('content')
    <h1>Productos</h1>
    <h5>Listado de productos</h5>
    <hr>
    <!-- Imprimimos el nombre del producti -->

    <div class="container">
    <a class="btn btn-danger btn-sm" href="/products/create">Agregar producto nuevo</a>
        <table class="table table-hover caption-top table-responsive">
        <caption>Lista de productos</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{--listado de productos--}}
                @foreach ($productos as $item)
                <tr>
                    <th scope="row">{{$item->codigo }}</th>
                    <td>{{$item->nombre }}</td>
                    <td>{{$item->precio }}</td>
                    <td>{{$item->marca }}</td>

                    <td>

                        <a class="btn btn-success btn-sm" href="/products/edit/{{$item->codigo}}">Modificar</a>
                        <button class="btn btn-danger btn-sm" url="/products/destroy/{{$item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
