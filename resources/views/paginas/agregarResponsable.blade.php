@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <div class="card-header">
                    <h5 style="margin-left: 240px;">Registro De Responsables</h5>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/')}}/responsable/">
                        @csrf
                        <div class="row mb-3">
                            <label for="Nom_responsable" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Del Responsable') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_responsable" type="text" min="0" value="" placeholder="Ingrese El Nombre Del Responsable" class="form-control @error('Nom_responsable') is-invalid @enderror" name="Nom_responsable" value="{{ old('Nom_responsable') }}" required autocomplete="Nom_responsable">

                                @error('Nom_responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Correo_responsable" class="col-md-4 col-form-label text-md-end">{{ __('Correo Del Responsable') }}</label>

                            <div class="col-md-6">
                                <input id="Correo_responsable" type="email" min="0" value="" placeholder="Ingrese El Correo Del Responsable" class="form-control @error('Correo_responsable') is-invalid @enderror" name="Correo_responsable" value="{{ old('Correo_responsable') }}" required autocomplete="Correo_responsable">

                                @error('Correo_responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Tel_responsable" class="col-md-4 col-form-label text-md-end">{{ __('Telefono Del Responsable') }}</label>

                            <div class="col-md-6">
                                <input id="Tel_responsable" type="number" min="0" value="" placeholder="Ingrese El Telefono Del Responsable" class="form-control @error('Tel_responsable') is-invalid @enderror" name="Tel_responsable" value="{{ old('Tel_responsable') }}" required autocomplete="Tel_responsable">

                                @error('Tel_responsable')
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