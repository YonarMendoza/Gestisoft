<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <title>Gestisoft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Integrantes.css')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/17405db9f0.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        section {
            text-align: center;
            margin: 20px;
            width: 250px; /* Set a fixed width for consistency */
        }

        section img {
            width: 100%;
            height: 250px; /* Set a fixed height for consistency */
            object-fit: cover; /* Ensures the image covers the area without distortion */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, filter 0.3s, box-shadow 0.3s;
            filter: grayscale(50%);
        }

        section img:hover {
            transform: scale(1.05) rotate(2deg);
            filter: grayscale(0%);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        section h2 {
            font-size: 20px; /* Uniform font size */
            margin: 10px 0;
        }

        section p {
            font-size: 16px; /* Uniform font size */
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="font-size: 17px;">
            <div class="container">
                <a style="margin-left: -80px;" class="navbar-brand" href="{{ url('http://127.0.0.1:8000/') }}">
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
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                 <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('http://127.0.0.1:8000/') }}"><i style="margin-left:10px" class="fa-solid fa-house"></i><br><b>Inicio</b></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i style="margin-left: 70px;" class="fa-solid fa-network-wired"></i> <br><b>Unidades Productivas</b>
                                    </a>
                                    <ul class="dropdown-menu" style="font-size: 16px;">
                                        <li><a class="dropdown-item" href="{{ url('cunicultura') }}"><b>Unidad De Cunicultura</b></a></li>
                                        <li><a class="dropdown-item" href="{{ url('caprinos') }}"><b>Unidad De Caprinos</a></b></li>
                                        <li><a class="dropdown-item" href="{{ url('ganaderia') }}"><b>Unidad De Ganaderia</b></a></li>
                                        <li><a class="dropdown-item" href="{{ url('ovinos') }}"><b>Unidad De Ovinos</b></a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ url('quienes') }}"><i style="margin-left:40px"  class="fa-solid fa-users"></i> <br><b>Desarrolladores</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}"><i style="margin-left:40px" class="fa-sharp fa-solid fa-user"></i> <br><b>{{ __('Iniciar Sesion') }}</b></a>
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
            <img src="{{ asset('img/aaa.png')}}" alt="Nombre del Desarrollador">
            <h2><b>Nombre del Desarrollador</b></h2>
            <p><b> Rol:</b> <br> Rol del Desarrollador</p>
            <p><b> Correo:</b> <br> Correo del Desarrollador</p>
        </section>
        <section>
            <img src="{{ asset('img/aaa.png')}}" alt="Nombre del Desarrollador">
            <h2><b>Nombre del Desarrollador</b></h2>
            <p><b> Rol:</b> <br> Rol del Desarrollador</p>
            <p><b> Correo:</b> <br>Correo del Desarrollador</p>
        </section>
        <section>
            <img src="{{ asset('img/aaa.png')}}" alt="Nombre del Desarrollador">
            <h2><b>Nombre del Desarrollador</b></h2>
            <p><b> Rol:</b> <br>Rol del Desarrollador</p>
            <p><b> Correo:</b> <br>Correo del Desarrollador</p>
        </section>
        <section>
            <img src="{{ asset('img/aaa.png')}}" alt="Nombre del Desarrollador">
            <h2><b>Nombre del Desarrollador</b></h2>
            <p><b> Rol:</b> <br>Rol del Desarrollador</p>
            <p><b> Correo:</b> <br>Correo del Desarrollador</p>
        </section>
    </main>
</body>

</html>
