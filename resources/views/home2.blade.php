<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Estilos para dropdowns anidados */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -5px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            

                            <li class="nav-item">
                                <a href="/home" class="nav-link active" aria-current="page">Inicio</a>
                            </li>
                            <li class="nav-item">
                            <li>
                                <a class="nav-link" href="/products/show">Producto</a>
                            </li>
                            </li>
                            <li class="nav-item">
                            <li>
                                <a class="nav-link" href="/cliente/show">Cliente</a>
                            </li>
                            </li>
                            <li class="nav-item">
                            <li>
                                <a class="nav-link" href="/categoria/show">Categoria</a>
                            </li>
                            </li>




                            {{--aqui las opciones del menu que lleva los submenu--}}

                            <div class="nav-item dropdown dropdown-menu-dark">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                    Clientes
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="/cliente/show">Ver clientes</a></li>
                                    <li><a class="dropdown-item" href="/cliente/create">Crear</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <!-- Dropdown anidado -->
                                    <li class="dropdown-submenu dropdown-menu-dark">
                                        <a class="dropdown-item dropdown-toggle" href="#">Categorias</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li><a class="dropdown-item" href="/categoria/show">Ver categorias</a></li>
                                            <li><a class="dropdown-item" href="/categoria/create">Crear 2</a></li>
                                        </ul>
                                    </li>


                                </ul>
                            </div>



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" vpre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Agregamos la clase containe --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        // Función para manejar dropdowns anidados
        document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.stopPropagation();
                e.preventDefault();
                let nextEl = this.nextElementSibling;
                if (nextEl && nextEl.classList.contains('dropdown-menu')) {
                    nextEl.classList.toggle('show');
                }
            });
        });
    </script>
</body>

</html>
{{-- script --}}
@yield('scripts')
