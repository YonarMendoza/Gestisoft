@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>¡ Bienvenido de nuevo <b>{{ Auth::user()->name }} </b>! Nos complace verte de regreso. <br> Esperamos que hayas tenido un buen día y estés listo para sumergirte en una experiencia increíble. En nuestro sitio, encontrarás una amplia gama de opciones y funciones para explorar y disfrutar.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
