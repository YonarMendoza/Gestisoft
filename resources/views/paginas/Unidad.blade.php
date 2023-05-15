@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Unidades</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Codigo Unidad</th>
                                <th scope="col">Nombre Unidad</th>
                                <th scope="col">Total Animales</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Unidad as $unidad)
                                <tr>
                                    <td>{{$unidad['Codigo_unidad']}}</td>
                                    <td>{{$unidad['Nom_unidad']}}</td>
                                    <td>{{$unidad['Total_animales']}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/')}}/unidad/{{$unidad['Id_unidad']}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <span style="margin-left: 10px;" class="btn btn-danger" v-on:click="eliminarUnidad({{$unidad['Id_unidad']}})"><i class="fa-solid fa-trash"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection