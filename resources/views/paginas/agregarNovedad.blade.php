@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <div class="card-header">
                    <h5 style="margin-left: 240px;">Registro De Novedades</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/')}}/novedad/">
                        @csrf

                        <div class="row mb-3">
                            <label for="Codigo_novedad" class="col-md-4 col-form-label text-md-end">{{ __('Codigo De La Novedad') }}</label>

                            <div class="col-md-6">
                                <input id="Codigo_novedad" type="number" min="0" value="" class="form-control @error('Codigo_novedad') is-invalid @enderror" name="Codigo_novedad" value="{{ old('Codigo_novedad') }}" placeholder="Ingrese El Codigo De La Novedad" required autocomplete="Codigo_novedad">

                                @error('Codigo_novedad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Id_unidad" class="col-md-4 col-form-label text-md-end">{{ __('Fecha De La Novedad') }}</label>
                            <div class="col-md-6">
                                <input id="Fech_novedad" type="date" min="0" value="" class="form-control @error('Fech_novedad') is-invalid @enderror" name="Fech_novedad" value="{{ old('Fech_novedad') }}" required autocomplete="Fech_novedad">

                                @error('Fech_novedad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Nom_novedad" class="col-md-4 col-form-label text-md-end">{{ __('Nombre De La Novedad') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_novedad" type="text" value="" class="form-control @error('Nom_novedad') is-invalid @enderror" name="Nom_novedad" placeholder="Ingrese El Nombre De La Novedad" value="{{ old('Nom_novedad') }}" required autocomplete="Nom_novedad">

                                @error('Nom_novedad')
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
                                        {{$semoviente['Placa_inventario'].' --- '.$semoviente['Nom_semoviente']}}
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
                                <input id="Descripcion" type="text" value="" class="form-control @error('Descripcion') is-invalid @enderror" placeholder="Ingrese Una Descripcion De La Novedad" name="Descripcion" value="{{ old('Descripcion') }}" required autocomplete="Descripcion">

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
                                <input id="Responsable" type="text" value="" class="form-control @error('Responsable') is-invalid @enderror" placeholder="Ingrese El Nombre Del Responsable" name="Responsable" value="{{ old('Responsable') }}" required autocomplete="Responsable">

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