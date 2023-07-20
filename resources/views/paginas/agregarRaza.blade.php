@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Agregar Registro De Razas</h1>
                <div class="card-body">
                    <form method="POST" action="{{ url('/')}}/raza/">
                        @csrf
                        <div class="row mb-3">
                            <label for="Nom_raza" class="col-md-4 col-form-label text-md-end">{{ __('Nombre De La Raza') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_raza" oninput="capitalizeFirstLetter(this)" type="text" value="" class="form-control @error('Nom_raza') is-invalid @enderror" placeholder="Ingrese El Nombre De La Raza" name="Nom_raza" value="{{ old('Nom_raza') }}" required autocomplete="Nom_raza">

                                @error('Nom_raza')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="margin-left: 80px;" type="submit" class="btn btn-success" v-on:click="GuardarregistroRaza()">
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