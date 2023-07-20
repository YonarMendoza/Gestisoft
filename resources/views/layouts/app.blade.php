@if (isset( Auth::user()->name ))
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestisoft</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/17405db9f0.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body style="background: rgba(1, 1, 1, 1.0);
                background: linear-gradient(315deg, rgba(1, 1, 1, 1.0), rgba(6, 118, 43, 1.0));
                background-repeat: no-repeat;min-height: 100vh;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm " style="font-size: 15.7px;">
            <div class="container">
                <a style="margin-left: -80px;" class="navbar-brand" href="{{ url('home') }}">
                    <img src="{{ asset('img/aaa.png')}}" style="width: 100px;height: 100px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                    </ul>
                    @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/Conejo1.png') }}" style="width: 20px;margin-left:20px" alt="Icono SVG"><b> <br>Gestionar <br> Razas</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarRaza') }}"><b> Registrar raza</b></a></li>
                                <li><a class="dropdown-item" href="{{ url('raza') }}"><b> Consultar raza</b></a></li>
                            </ul>
                        </li>
                        @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/cerro.png') }}" style="width: 20px;margin-left:20px" alt="Icono SVG"><b> <br>Gestionar <br> Unidades</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarUnidad') }}"><b> Registrar Unidad</b></a></li>
                                <li><a class="dropdown-item" href="{{ url('unidad') }}"><b> Consultar Unidad</b></a></li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/Cabra1.webp') }}" style="width: 20px;margin-left:15px" alt="Icono SVG"><b> <br>Gestionar <br> Semovientes</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarSemoviente') }}"><b> Registrar Semoviente</b></a></li>
                                <li><a class="dropdown-item" href="{{ url('semoviente') }}"><b> Consultar Semoviente</b></a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-users-line" style="margin-left:20px"></i><b> <br> Gestionar <br> Responsables</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarResponsable') }}"><b> Registrar Responsable</b></a></li>
                                <li><a class="dropdown-item" href="{{ url('responsable') }}"><b> Consultar Responsable</b></a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/alarma.png') }}" style="width: 20px;margin-left:20px" alt="Icono SVG"><b> <br> Gestionar <br> Novedades</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarNovedad') }}"><b> Registrar Novedad</b></a></li>
                                <li><a class="dropdown-item" href="{{ url('novedad') }}"><b> Consultar Novedad</b></a></li>
                            </ul>
                        </li>
                        @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i style="margin-left: 20px;" class="fa-solid fa-users-gear"></i><b> <br> Gestionar <br> Usuarios</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarUsuarios') }}"><b> Registrar Usuario</b></a></li>
                                <li><a class="dropdown-item" href="{{ url('usuarios') }}"><b> Consultar Usuario</b></a></li>
                            </ul>
                        </li>
                        @endif
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i style="margin-left:90px" class="fa-solid fa-user-xmark"></i><b> <br> {{ Auth::user()->name }}</b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <b> Cerrar Sesion</b>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    @endif
                    @if (Auth::check() && Auth::user()->Tipo_usuario == 'Aprendiz')
                    <ul class="navbar-nav ms-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <img src="{{ asset('img/Conejo1.png') }}" style="width: 20px;margin-left:70px" alt="Icono SVG"><a class="nav-link active" aria-current="page" href="{{ url('raza') }}"><b> Consultar Razas</b></a>
                            </li>
                            <li class="nav-item">
                                <img src="{{ asset('img/cerro.png') }}" style="width: 20px;margin-left:70px" alt="Icono SVG"><a class="nav-link active" aria-current="page" href="{{ url('unidad') }}"><b>Consultar Unidades</b></a>
                            </li>
                            <li class="nav-item">
                                <img src="{{ asset('img/Cabra1.webp') }}" style="width: 20px;margin-left:70px" alt="Icono SVG"> <a class="nav-link active" aria-current="page" href="{{ url('semoviente') }}"><b>Consultar Semovientes</b></a>
                            </li>
                            <li class="nav-item">
                                <img src="{{ asset('img/alarma.png') }}" style="width: 20px;margin-left:70px" alt="Icono SVG"><a class="nav-link active" aria-current="page" href="{{ url('novedad') }}"><b>Consultar Novedades</b></a>
                            </li>
                        </ul>
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i style="margin-left:70px" class="fa-solid fa-user-xmark"></i><b> <br> {{ Auth::user()->name }}</b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <b> Cerrar Sesion</b>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
    function capitalizeFirstLetter(input) {
        var words = input.value.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
        }
        input.value = words.join(' ');
    }
</script>

</html>
@endif