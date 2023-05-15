@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro De Mortalidades') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/')}}/mortalidad/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Codigo_mortalidad" class="col-md-4 col-form-label text-md-end">{{ __('Codigo De La Mortalidad') }}</label>

                            <div class="col-md-6">
                                <input id="Codigo_mortalidad" type="number" min="0" value="" class="form-control @error('Codigo_mortalidad') is-invalid @enderror" name="Codigo_mortalidad" value="{{ old('Codigo_mortalidad') }}" required autocomplete="Codigo_mortalidad">

                                @error('Codigo_mortalidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_unidad" class="col-md-4 col-form-label text-md-end">{{ __('Fecha De La Mortalidad') }}</label>
                            <div class="col-md-6">
                                <input id="Fech_mortalidad" type="date" min="0" value="" class="form-control @error('Fech_mortalidad') is-invalid @enderror" name="Fech_mortalidad" value="{{ old('Fech_mortalidad') }}" required autocomplete="Fech_mortalidad">

                                @error('Fech_mortalidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_semoviente" class="col-md-4 col-form-label text-md-end">{{ __('Codigo Del Semoviente') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="Id_semoviente" aria-label="Default select example">
                                    <option value="">Seleccione una...</option>
                                    @foreach($Semoviente as $semoviente)
                                    <option value="{{$semoviente['Id_semoviente']}}">
                                        {{$semoviente['Codigo_semoviente'].' --- '.$semoviente['Nom_semoviente']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('Id_semoviente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <input id="Descripcion" type="text" value="" class="form-control @error('Descripcion') is-invalid @enderror" name="Descripcion" value="{{ old('Descripcion') }}" required autocomplete="Descripcion">

                                @error('Descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Responsable" class="col-md-4 col-form-label text-md-end">{{ __('Responsable') }}</label>

                            <div class="col-md-6">
                                <input id="Responsable" type="text" value="" class="form-control @error('Responsable') is-invalid @enderror" name="Responsable" value="{{ old('Responsable') }}" required autocomplete="Responsable">

                                @error('Responsable')
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