@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-30">
            <div class="card">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Mortalidad</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-success table-striped">
                        <thead >
                            <tr>
                                <th scope="col">Codigo Mortalidad</th>
                                <th scope="col">Fecha Mortalidad</th>
                                <th scope="col">Nombre Semoviente</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Opciones</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Mortalidad as $mortalidad)
                                <tr>
                                    <td>{{$mortalidad['Codigo_mortalidad']}}</td>
                                    <td>{{$mortalidad['Fech_mortalidad']}}</td>
                                    <td>{{$mortalidad['Id_semoviente']}}</td>
                                    <td>{{$mortalidad['Descripcion']}}</td>
                                    <td>{{$mortalidad['Responsable']}}</td>
                                    
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/')}}/mortalidad/{{$mortalidad['Id_mortalidad']}}"><i class="fa-solid fa-pen-to-square"></i></a> 
                                        <span style="margin-left: 5px;" class="btn btn-danger" v-on:click="eliminarSemoviente({{$mortalidad['Id_mortalidad']}})"><i class="fa-solid fa-trash"></i></span>
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