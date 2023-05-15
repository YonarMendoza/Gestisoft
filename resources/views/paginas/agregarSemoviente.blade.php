@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro De Semovientes') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/')}}/semoviente/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Codigo_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Codigo Del Semoviente') }}</label>

                            <div class="col-md-6">
                                <input id="Codigo_semoviente" type="number" min="0" value="" class="form-control @error('Codigo_semoviente') is-invalid @enderror" name="Codigo_semoviente" value="{{ old('Codigo_semoviente') }}" required autocomplete="Codigo_semoviente">

                                @error('Codigo_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_unidad" class="col-md-4 col-form-label text-md-end">{{ __('Codigo De La unidad') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" name="Id_unidad" aria-label="Default select example">
                                    <option value="">Seleccione una...</option>
                                    @foreach($unidad as $Unidad)
                                    <option value="{{$Unidad['Id_unidad']}}">
                                        {{$Unidad['Codigo_unidad'].' --- '.$Unidad['Nom_unidad']}}
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
                            <label for="Nom_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Del Semoviente') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_semoviente" type="text" value="" class="form-control @error('Nom_semoviente') is-invalid @enderror" name="Nom_semoviente" value="{{ old('Nom_semoviente') }}" required autocomplete="Nom_semoviente">

                                @error('Nom_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_raza" class="col-md-4 col-form-label text-md-end">{{ __('Codigo De La Raza') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="Id_raza" aria-label="Default select example">
                                    <option value="" selected>Seleccione una...</option>
                                    @foreach($raza as $Raza)
                                    <option value="{{$Raza['Id_raza']}}">
                                        {{$Raza['Codigo_raza'].' --- '.$Raza['Nom_raza']}}
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
                                    <option value="" selected>Seleccione una...</option>
                                    <option value="Reproductor">Reproductor</option>
                                    <option value="Lactante">Lactante</option>
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
                                    <option value="" selected>Seleccione una...</option>
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
                                <input id="Fech_nacimiento" type="date" value="" class="form-control @error('Fech_nacimiento') is-invalid @enderror" name="Fech_nacimiento" value="{{ old('Fech_nacimiento') }}" required autocomplete="Fech_nacimiento">

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
                                <input id="Peso_nacimiento" step="any" type="number" min="0" value="" class="form-control @error('Peso_nacimiento') is-invalid @enderror" name="Peso_nacimiento" value="{{ old('Peso_nacimiento') }}" required autocomplete="Peso_nacimiento">

                                @error('Peso_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Placa_inventario" class="col-md-4 col-form-label text-md-end">{{ __('Placa De Inventario') }}</label>

                            <div class="col-md-6">
                                <input id="Placa_inventario" type="number" min="0" value="" class="form-control @error('Placa_inventario') is-invalid @enderror" name="Placa_inventario" value="{{ old('Placa_inventario') }}" required autocomplete="Placa_inventario">

                                @error('Placa_inventario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Fech_ingreso" class="col-md-4 col-form-label text-md-end">{{ __('Fecha De Ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="Fech_ingreso" type="date" value="" class="form-control @error('Fech_ingreso') is-invalid @enderror" name="Fech_ingreso" value="{{ old('Fech_ingreso') }}" required autocomplete="Fech_ingreso">

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
                                    <option value="" selected>Seleccione una...</option>
                                    <option value="Nacimiento">Nacimiento</option>
                                    <option value="Compra">Compra</option>
                                    <option value="Obsequio">Obsequio</option>
                                </select>

                                @error('Tipo_ingreso')
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection