@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Editar Registro De Usuarios</h1>

                <div class="card-body">
                    @foreach($Usuario as $usuario)
                    <form method="POST" action="{{ url('/')}}/usuarios/{{$usuario['id']}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Del Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="name" oninput="capitalizeFirstLetter(this)" type="text" value="{{ $usuario['name']}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" min="0" oninput="capitalizeFirstLetter(this)" value="{{ $usuario['email']}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Tipo_usuario" class="col-md-4 col-form-label text-md-end">{{ __('Tipo De Usuario') }}</label>

                            <div class="col-md-6">

                                <select class="form-select" name="Tipo_usuario" aria-label="Default select example">
                                    <option value="{{ $usuario['Tipo_usuario']}}" selected>{{ $usuario['Tipo_usuario']}}</option>
                                    <option value="Instructor">Instructor</option>
                                    <option value="Pasante">Pasante</option>
                                    <option value="Aprendiz">Aprendiz</option>
                                </select>
                                @error('Tipo_usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="passwordInput" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese Tu Contraseña" name="password" value="{{ old('password') }}" autocomplete="new-password">
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
                        </div>
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="passwordConfirmationInput" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirme Su Contraseña" name="password_confirmation" autocomplete="new-password">
                                    <button class="btn btn-outline-secondary" type="button" id="verPasswordConfirmationButton" onclick="togglePasswordVisibility('passwordConfirmationInput', 'verPasswordConfirmationIcon')">
                                        <i id="verPasswordConfirmationIcon" class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="margin-left: 80px;" type="submit" class="btn btn-success">
                                    <i class="fa-sharp fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@endif

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
