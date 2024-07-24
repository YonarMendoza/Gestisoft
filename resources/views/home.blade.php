@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="welcome-message text-center">
                        <h3 class="mb-4" style="font-weight: 700; color: #333;">¡Bienvenido de nuevo, <b>{{ Auth::user()->name }}</b>!</h3>
                        <p style="font-size: 1rem; color: #666;">Nos complace verte de regreso. Esperamos que hayas tenido un buen día y estés listo para sumergirte en una experiencia increíble. En nuestro sitio, encontrarás una amplia gama de opciones y funciones para explorar y disfrutar.</p>
                        <div class="my-4">
                            <img src="{{ asset('img/bienvenida.png') }}" style="width: 100%; max-width: 230px; height: auto; border-radius: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
