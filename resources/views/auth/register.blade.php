<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <title>Gestisoft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Login.css')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/17405db9f0.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style=" background: rgba(1, 1, 1, 1.0);
                background: linear-gradient(315deg, rgba(1, 1, 1, 1.0), rgba(6, 118, 43, 1.0));
                background-repeat: no-repeat;
                ">
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

    <div>
        <div class="col-md-7">
            <div class="card" style="width: 800px; margin-left: 260px;height:750px;margin-top:-30px;margin-bottom:30px; border: 7px ridge white;   border-radius: 50%;">

                <div class="card-body" style="width: 400px; margin-left: 190px;">

                    <div class="text-center">
                        <img src="{{ asset('img/aaa.png')}}" style="width: 100px;height: 100px;margin-top: 10px;">
                        <br>
                        <h4 style="margin-top: 30px;"><b>Registrarse</b></h4>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <br>
                        <h style="margin-top: 10px;"><b>Por Favor, Deligenciar Todos Los Campos</b></h>
                        <div class="row mb-3">
                            <div class="form-outline mb-4" style="margin-top: 20px;">
                                <label class="form-label" for="form2Example11"><b>Nombre</b></label>
                                <input type="text" name="name" id="form2Example11" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingrese Tu Nombre" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example11"><b>Correo Electronico</b></label>
                                <input type="email" name="email" id="form2Example11" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese Tu Correo Electronico" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example22"><b>Contraseña</b></label>
                                <input type="password" name="password" id="form2Example22" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingrese Tu Contraseña" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example22"><b>Confirmar Tu Contraseña</b></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ingrese Tu Contraseña Para La Confirmación">

                            </div>

                            <div class="text-center pt-1 mb-5 pb-1">
                                <button style="  background-image: linear-gradient(to right, black, green);
                                color: white;padding: 10px 20px;border: none;border-radius: 5px;font-size: 16px;cursor: pointer;" type="submit">Registrarse
                                </button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>