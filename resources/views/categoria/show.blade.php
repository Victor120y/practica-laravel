{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- definimos el titulo --}}
@section('title', 'Categorias')


{{--Definimos el contenido --}}
@section('content')
    <h1>Categorias</h1>
    <h5>Listado de Categoria </h5>
    <hr>

    <div class="container">
    <a class="btn btn-danger btn-sm" href="/categoria/create">Agregar categoria nueva</a>
        <table class="table table-hover caption-top table-responsive">
        <caption>Lista de Categorias</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{--listado de categorias--}}
                @foreach ($categorias as $item)
                <tr>
                    <th scope="row">{{$item->codigo }}</th>
                    <td>{{$item->nombre }}</td>


                    <td>

                        <a class="btn btn-success btn-sm" href="/categoria/edit/{{$item->codigo}}">Modificar</a>
                        <button class="btn btn-danger btn-sm" url="/categoria/destroy/{{$item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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
