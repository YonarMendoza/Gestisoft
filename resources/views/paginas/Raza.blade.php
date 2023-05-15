@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center" style="margin-left: 230px;">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Buscar Raza:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="textoRaza" v-on:keyup="buscarRaza">
        </div>
        <div class="col-auto">
            <span v-if="centroRaza.length == 0" class="btn btn-success" v-on:click="buscarRaza">Todos</span>
        </div>

    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Razas</h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Codigo Raza</th>
                                <th scope="col">Nombre Raza</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr v-for="Raza in centroRaza">
                                <td>@{{Raza.Codigo_raza}}</td>
                                <td>@{{Raza.Nom_raza}}</</td>
                                <td>
                                    <a class="btn btn-success" v-bind:href="'http://127.0.0.1:8000/raza/'+ Raza.Id_raza"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <span style="margin-left: 10px;" class="btn btn-danger" v-on:click="eliminarRaza(Raza.Id_raza)"><i class="fa-solid fa-trash"></i></span>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection