@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Editar Registro De Semovientes</h1>
                <div class="card-body">
                    @foreach($Semoviente as $semoviente)
                    <form method="POST" action="{{ url('/')}}/semoviente/{{$semoviente['Id_semoviente']}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="Placa_inventario" class="col-md-4 col-form-label text-md-end">{{ __('Placa De Inventario') }}</label>

                            <div class="col-md-6">
                                <input id="Placa_inventario" oninput="capitalizeFirstLetter(this)" type="number" readonly min="0" value="{{ $semoviente['Placa_inventario']}}" class="form-control @error('Placa_inventario') is-invalid @enderror" name="Placa_inventario" value="{{ old('Placa_inventario') }}" required autocomplete="Placa_inventario">

                                @error('Placa_inventario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_unidad" class="col-md-4 col-form-label text-md-end">{{ __('Nombre De La unidad') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" name="Id_unidad" aria-label="Default select example">
                                    @foreach($unidad as $Unidad)
                                    <option value="{{$Unidad['Id_unidad']}}" {{$Unidad['Id_unidad'] == $semoviente['Id_unidad'] ? "selected" : "" }}>
                                        {{$Unidad['Nom_unidad']}}
                                    </option>
                                    @endforeach
                                </select>

                                @error('Id_unidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Nom_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Identificación Del Semoviente') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_semoviente" oninput="capitalizeFirstLetter(this)" type="text" value="{{ $semoviente['Nom_semoviente']}}" class="form-control @error('Nom_semoviente') is-invalid @enderror" name="Nom_semoviente" value="{{ old('Nom_semoviente') }}" required autocomplete="Nom_semoviente">

                                @error('Nom_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_raza" class="col-md-4 col-form-label text-md-end">{{ __('Nombre De La Raza') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="Id_raza" aria-label="Default select example">
                                    @foreach($raza as $Raza)
                                    <option value="{{$Raza['Id_raza']}}" {{$Raza['Id_raza'] == $semoviente['Id_raza'] ? "selected" : "" }}>
                                        {{$Raza['Nom_raza']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('Id_raza')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Tipo_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Tipo De Semoviente') }}</label>

                            <div class="col-md-6">

                                <select class="form-select" name="Tipo_semoviente" aria-label="Default select example">
                                    <option value="{{ $semoviente['Tipo_semoviente']}}" selected>{{ $semoviente['Tipo_semoviente']}}</option>
                                    <option value="Reproductor">Reproductor</option>
                                    <option value="Lactante">Lactante</option>
                                    <option value="Levante">Levante</option>
                                    <option value="Ceba">Ceba</option>
                                    <option value="Hembra en etapa de reproducción">Hembra en etapa de reproducción</option>
                                    <option value="Hembra de vientre">Hembra de vientre</option>
                                </select>
                                @error('Tipo_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Sexo_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Sexo Semoviente') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="Sexo_semoviente" aria-label="Default select example">
                                    <option value="{{ $semoviente['Sexo_semoviente']}}" selected>{{ $semoviente['Sexo_semoviente']}}</option>
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                                @error('Sexo_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Fech_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha De Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="Fech_nacimiento" type="date" value="{{ $semoviente['Fech_nacimiento']}}" class="form-control @error('Fech_nacimiento') is-invalid @enderror" name="Fech_nacimiento" value="{{ old('Fech_nacimiento') }}" required autocomplete="Fech_nacimiento">

                                @error('Fech_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Peso_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Peso De Nacimiento(Kg)') }}</label>

                            <div class="col-md-6">
                                <input id="Peso_nacimiento" step="any" type="number" min="0" value="{{ $semoviente['Peso_nacimiento']}}" class="form-control @error('Peso_nacimiento') is-invalid @enderror" name="Peso_nacimiento" value="{{ old('Peso_nacimiento') }}" required autocomplete="Peso_nacimiento">

                                @error('Peso_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Fech_ingreso" class="col-md-4 col-form-label text-md-end">{{ __('Fecha De Ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="Fech_ingreso" type="date" value="{{ $semoviente['Fech_ingreso']}}" class="form-control @error('Fech_ingreso') is-invalid @enderror" name="Fech_ingreso" value="{{ old('Fech_ingreso') }}" required autocomplete="Fech_ingreso">

                                @error('Fech_ingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Tipo_ingreso" class="col-md-4 col-form-label text-md-end">{{ __('Tipo De Ingreso') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="Tipo_ingreso" aria-label="Default select example">
                                    <option value="{{ $semoviente['Tipo_ingreso']}}" selected>{{ $semoviente['Tipo_ingreso']}}</option>
                                    <option value="Nacimiento">Nacimiento</option>
                                    <option value="Compra">Compra</option>
                                    <option value="Donación">Donación</option>
                                </select>

                                @error('Tipo_ingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Placa_padre" class="col-md-4 col-form-label text-md-end">{{ __('Placa Padre') }}</label>

                            <div class="col-md-6">
                                <input id="Placa_padre" type="number" min="0" value="{{$semoviente['Placa_padre']}}" placeholder="Ingrese La Placa De Inventario Del Padre" class="form-control @error('Placa_padre') is-invalid @enderror" name="Placa_padre" value="{{ old('Placa_padre') }}" required autocomplete="Placa_padre">

                                @error('Placa_padre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Placa_madre" class="col-md-4 col-form-label text-md-end">{{ __('Placa Madre') }}</label>

                            <div class="col-md-6">
                                <input id="Placa_madre" type="number" min="0" value="{{$semoviente['Placa_madre']}}" placeholder="Ingrese La Placa De Inventario Madre" class="form-control @error('Placa_madre') is-invalid @enderror" name="Placa_madre" value="{{ old('Placa_madre') }}" required autocomplete="Placa_madre">

                                @error('Placa_madre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Valor_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Valor Semoviente (COP)') }}</label>
                            <div class="col-md-6">
                                <input id="Valor_semoviente" type="number" value="{{$semoviente['Valor_semoviente']}}" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" min="0" value="{{ old('Valor_semoviente') }}" placeholder="Ingrese el Valor del Semoviente" class="form-control @error('Valor_semoviente') is-invalid @enderror" name="Valor_semoviente" required autocomplete="Valor_semoviente">

                                @error('Valor_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="margin-left: 80px;" type="submit" class="btn btn-success" v-on:click="Editarregistro()">
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