@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-30">
            <div class="card">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Semovientes</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-success table-striped">
                        <thead >
                            <tr>
                                <th scope="col">Codigo semoviente</th>
                                <th scope="col">Nombre Unidad</th>
                                <th scope="col">Nombre Semoviente</th>
                                <th scope="col">Nombre Raza</th>
                                <th scope="col">Tipo Semoviente</th>
                                <th scope="col">Sexo Semoviente</th>
                                <th scope="col">Fecha Nacimiento</th>
                                <th scope="col">Peso Nacimiento</th>
                                <th scope="col">Placa Inventario</th>
                                <th scope="col">Fecha Ingreso</th>
                                <th scope="col">Tipo Ingreso</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Semoviente as $semoviente)
                                <tr>
                                    <td>{{$semoviente['Codigo_semoviente']}}</td>
                                    <td>{{$semoviente['Id_unidad']}}</td>
                                    <td>{{$semoviente['Nom_semoviente']}}</td>
                                    <td>{{$semoviente['Id_raza']}}</td>
                                    <td>{{$semoviente['Tipo_semoviente']}}</td>
                                    <td>{{$semoviente['Sexo_semoviente']}}</td>
                                    <td>{{$semoviente['Fech_nacimiento']}}</td>
                                    <td>{{$semoviente['Peso_nacimiento']}}</td>
                                    <td>{{$semoviente['Placa_inventario']}}</td>
                                    <td>{{$semoviente['Fech_ingreso']}}</td>
                                    <td>{{$semoviente['Tipo_ingreso']}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/')}}/semoviente/{{$semoviente['Id_semoviente']}}"><i class="fa-solid fa-pen-to-square"></i></a> 
                                        <span style="margin-top: -60px;margin-left:50px" class="btn btn-danger" v-on:click="eliminarSemoviente({{$semoviente['Id_semoviente']}})"><i class="fa-solid fa-trash"></i></span>
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