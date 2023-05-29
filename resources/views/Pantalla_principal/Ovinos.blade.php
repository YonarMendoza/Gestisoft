<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <title>Gestisoft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Ovinos.css')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/17405db9f0.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="font-size: 17px;">
            <div class="container">
                <a style="margin-left: -80px;" class="navbar-brand" href="{{ url('http://127.0.0.1:8000/')  }}">
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
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}"><i style="margin-left:40px" class="fa-sharp fa-solid fa-user"></i> <br><b>{{ __('Iniciar Sesion') }}</b></a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}"><i style="margin-left:30px" class="fa-solid fa-user-plus"></i><br><b>{{ __('Registrarse') }}</b></a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <section id="pantalla-dividida">
        <div class="izquierda">
            <br>
            <h1>Unidad De Ovinos</h1>
            <br>
            <p>Una unidad de ovejas en una granja generalmente se refiere a un grupo de ovejas que se mantienen y crían juntas como un solo rebaño. <br> El tamaño de la unidad puede variar según las prácticas de manejo de la granja y el número de ovejas en el rebaño.</p>
        </div>
        <div class="derecha"></div>
    </section>
</body>

</html>