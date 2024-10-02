<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Aqui irá el titulo de cada pagina--}}
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    {{--Nuestro menú --}}
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Invetario</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" ariallabel="Togglenavigation"><span class="navbar-toggker-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link active" aria-current="page">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <li>
                        <a class="nav-link" href="/products/show">Producto</a></li>
                    </li>
                    <li class="nav-item">
                    <li>
                        <a class="nav-link" href="/cliente/show">Cliente</a></li>
                    </li>
                    <li class="nav-item">
                    <li>
                        <a class="nav-link" href="/categoria/show">Categoria</a></li>
                    </li>
                    <li class="nav-item dropdown">
                    <!--<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/products/show">Show</a></li>
                        <li><a class="dropdown-item" href="/products/create">Create</a></li>

                    </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Clientes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/cliente/show">Show</a></li>
                        <li><a class="dropdown-item" href="/cliente/create">Create</a></li>

                    </ul>
                    </li>

                   
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Categorias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/categoria/show">Show</a></li>
                        <li><a class="dropdown-item" href="/categoria/create">Create</a></li>

                    </ul>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        {{--Aquí irá el contneido de todas las paginas--}}
        @yield('content')
    </div>

    @yield('scripts')



</body>
</html>
