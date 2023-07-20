@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Editar Registro De Unidades</h1>
                <div class="card-body">
                    @foreach($Unidad as $unidad)
                    <form method="POST" action="{{ url('/')}}/unidad/{{$unidad['Id_unidad']}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="Nom_unidad" class="col-md-4 col-form-label text-md-end">{{ __('Nombre De La Unidad') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_unidad" oninput="capitalizeFirstLetter(this)" type="text" value="{{ $unidad['Nom_unidad']}}" class="form-control @error('Nom_unidad') is-invalid @enderror" name="Nom_unidad" value="{{ old('Nom_unidad') }}" required autocomplete="Nom_unidad">

                                @error('Nom_unidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Total_animales" class="col-md-4 col-form-label text-md-end">{{ __('Total De Animales') }}</label>

                            <div class="col-md-6">
                                <input id="Total_animales" type="number" min="0" value="{{ $unidad['Total_animales']}}" class="form-control @error('Total_animales') is-invalid @enderror" name="Total_animales" value="{{ old('Total_animales') }}" required autocomplete="Total_animales">

                                @error('Total_animales')
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