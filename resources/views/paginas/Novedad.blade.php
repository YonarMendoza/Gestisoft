@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-30">
            <div class="card">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Novedad</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-success table-striped">
                        <thead >
                            <tr>
                                <th scope="col">Codigo Novedad</th>
                                <th scope="col">Fecha Novedad</th>
                                <th scope="col">Nombre Novedad</th>
                                <th scope="col">Nombre Semoviente</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Opciones</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Novedad as $novedad)
                                <tr>
                                    <td>{{$novedad['Codigo_novedad']}}</td>
                                    <td>{{$novedad['Fech_novedad']}}</td>
                                    <td>{{$novedad['Nom_novedad']}}</td>
                                    <td>{{$novedad['Id_semoviente']}}</td>
                                    <td>{{$novedad['Descripcion']}}</td>
                                    <td>{{$novedad['Responsable']}}</td>
                                    
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/')}}/novedad/{{$novedad['Id_novedad']}}"><i class="fa-solid fa-pen-to-square"></i></a> 
                                        <span style="margin-left: 5px;" class="btn btn-danger" v-on:click="eliminarSemoviente({{$novedad['Id_novedad']}})"><i class="fa-solid fa-trash"></i></span>
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