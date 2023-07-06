@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <div class="card-header">
                    <h5 style="margin-left: 240px;">Registro De Usuarios</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/')}}/usuarios/">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Del Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="" class="form-control @error('name') is-invalid @enderror" placeholder="Ingrese El Nombre Del Usuario" name="name" value="{{ old('name') }}" required autocomplete="name">

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
                                <input id="email" type="email" min="0" value="" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese El Correo Electronico" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    <option value="" selected>Seleccione una...</option>
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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" value="" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese La Contraseña Del Usuario" name="password" value="{{ old('password') }}" required autocomplete="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="margin-left: 80px;" type="submit" class="btn btn-success" v-on:click="Guardarregistro()">
                                    <i class="fa-sharp fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
@endif