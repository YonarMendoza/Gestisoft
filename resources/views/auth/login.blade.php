<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <title>Gestisoft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <a class="nav-link active" href="{{ url('quienes') }}"><i style="margin-left:40px" class="fa-solid fa-users"></i> <br><b>Desarrolladores</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}"><i style="margin-left:40px" class="fa-sharp fa-solid fa-user"></i> <br><b>{{ __('Iniciar Sesion') }}</b></a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <section class="vh-100" style="background: rgba(1, 1, 1, 1.0); background: linear-gradient(315deg, rgba(1, 1, 1, 1.0), rgba(6, 118, 43, 1.0)); background-repeat: no-repeat;margin-top:-50px">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 5rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{asset('img/aaa.png')}}" alt="login form" class="img-fluid" style="margin-left:10px;margin-top:80px" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{route('login')}}" method="post">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: green;"></i>
                                            <span class="h1 fw-bold mb-0">Gestisoft</span>
                                        </div>

                                        <h4 style="margin-top: 30px;margin:auto"><b>Iniciar Sesión</b></h4>
                                        <br>

                                        <h style="margin-top: 10px;"><b>Por Favor, Ingresar Tu Correo Electronico Y Contraseña</b></h>
                                        <div class="form-outline mb-4" style="margin-top: 20px;">
                                            <label class="form-label"><b>Correo Electronico</b></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese Tu Correo Electronico" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22"><b>Contraseña</b></label>
                                            <div class="input-group">
                                                <input id="passwordInput" type="password" value="" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese Tu Contraseña" name="password" required autocomplete="password">
                                                <button class="btn btn-outline-secondary" type="button" id="verPasswordButton" onclick="togglePasswordVisibility('passwordInput', 'verPasswordIcon')">
                                                    <i id="verPasswordIcon" class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button style="background-image: linear-gradient(to right, black, green);color: white;padding: 10px 20px;border: none;border-radius: 5px;font-size: 16px;cursor: pointer;" type="submit">Iniciar Sesión
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            var passwordInput = document.getElementById(inputId);
            var passwordIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
