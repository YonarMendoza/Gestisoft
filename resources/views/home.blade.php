@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 3px ridge white">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="welcome-message">
                        <h3 class="text-center" style="margin-bottom: 20px;">¡ Bienvenido de nuevo, <b>{{ Auth::user()->name }}</b> !</h3>
                        <p class="text-center" style="font-size: 16px;">Nos complace verte de regreso. Esperamos que hayas tenido un buen día y estés listo para sumergirte en una experiencia increíble. En nuestro sitio, encontrarás una amplia gama de opciones y funciones para explorar y disfrutar.</p>
                        <div class="text-center">
                            <img src="{{ asset('img/aaa.png')}}" style="width: 130px;height: 130px" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection