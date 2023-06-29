<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Caprinos.css')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/17405db9f0.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a style="margin-left: -80px;" class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/aaa.png')}}" style="width: 100px;height: 100px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestionar Razas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarRaza') }}">Registrar raza</a></li>
                                <li><a class="dropdown-item" href="{{ url('raza') }}">Consultar raza</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestionar Unidades
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarUnidad') }}">Registrar Unidad</a></li>
                                <li><a class="dropdown-item" href="{{ url('unidad') }}">Consultar Unidad</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestionar Semovientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarSemoviente') }}">Registrar Semoviente</a></li>
                                <li><a class="dropdown-item" href="{{ url('semoviente') }}">Consultar Semoviente</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestionar Novedades
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarNovedad') }}">Registrar Novedad</a></li>
                                <li><a class="dropdown-item" href="{{ url('novedad') }}">Consultar Novedad</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestionar Mortalidades
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('agregarMortalidad') }}">Registrar Mortalidad</a></li>
                                <li><a class="dropdown-item" href="{{ url('mortalidad') }}">Consultar Mortalidad</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('quienes') }}"><i style="margin-left:40px" class="fa-solid fa-users"></i> <br><b>Quienes Somos</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('login') }}"><i style="margin-left:40px" class="fa-sharp fa-solid fa-user"></i> <br><b>{{ __('Iniciar Sesion') }}</b></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('register') }}"><i style="margin-left:30px" class="fa-solid fa-user-plus"></i><br><b>{{ __('Registrarse') }}</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <main>
        <section>
            <img src="Logo_final.png" alt="Person 1">
            <h2>Yonar Estiber Mendoza Cuellar</h2>
            <p>Rol: Analista y Desarrollador</p>
        </section>
        <section>
            <img src="Logo_final.png" alt="Person 2">
            <h2>Laura Valentina Manchola Parra</h2>
            <p>Rol: Analista y Desarrolladora</p>
        </section>
        <section>
            <img src="Logo_final.png" alt="Person 3">
            <h2>Leidy Vanessa Jara <br> Saez</h2>
            <p>Rol: Analista y Desarrolladora</p>
        </section>
        <section>
            <img src="Logo_final.png" alt="Person 2">
            <h2>Carol Tatiana Carrera Quintana</h2>
            <p>Rol: Analista y Desarrolladora</p>
        </section>
    </main>
</body>

</html>