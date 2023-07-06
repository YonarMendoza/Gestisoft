@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Aprendiz')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 align-items-center" style="margin-left: 230px;">
        <div class="col-auto">
            <label style="color: white;" for="inputPassword6" class="col-form-label">Buscar Unidad:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" placeholder="Ingrese Datos A Buscar" v-model="textoUnidad" v-on:keyup="buscarUnidad">
        </div>
        <div class="col-auto">
            <span v-if="centroUnidad.length == 0" class="btn btn-success" v-on:click="buscarUnidad">Todos</span>
        </div>
        <ul class="navbar-nav ms-auto" style="margin-top:-10px">
            <li class="nav-item dropdown" style="margin-left: 450px;margin-top:-30px">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                    <i class="fa-solid fa-file-pdf"></i> Generar PDF
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" style="color: black;text-decoration: none;cursor: pointer" href="{{ url('unidad/pdf') }}">PDF De Unidades</a></li>
                </ul>
            </li>
        </ul>


    </div>
    <br>
    <!-- <nav aria-label="page navegation example" style="margin-left: 500px;">
        <ul class="pagination">
            <li v-bind:class="ocultarMostrarAnterior" v-on:click="anterior1" class="page-link" href="#" aria-label="previous">
                <span arial-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="(pagina, index) in paginas" v-bind:class="botones[index]">
                <a class="page-link" href="#" v-on:click="paginar1(pagina)">@{{pagina}}</a>
            </li>
            <li v-if="paginas == 1" class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-else v-bind:class="ocultarMostrarSiguiente">
                <a v-on:click="siguiente1" class="page-link" hfref="#" arial-label="Next">
                    <span arial-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav> -->
    <br>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="border: 3px ridge white">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Registro De Unidades</h1>
                <nav aria-label="page navegation example" style="margin-left: 10px;">
                    <ul class="pagination">
                        <li v-bind:class="ocultarMostrarAnterior" v-on:click="anterior1" class="page-link" href="#" aria-label="previous">
                            <span arial-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-for="(pagina, index) in paginas" v-bind:class="botones[index]">
                            <a class="page-link" href="#" v-on:click="paginar1(pagina)">@{{pagina}}</a>
                        </li>
                        <li v-if="paginas == 1" class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-else v-bind:class="ocultarMostrarSiguiente">
                            <a v-on:click="siguiente1" class="page-link" hfref="#" arial-label="Next">
                                <span arial-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre Unidad</th>
                                <th scope="col">Total Animales</th>
                                @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')

                                <th scope="col">Opciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(unidad,index) in centroUnidad" v-show="index >= desde && index < hasta">
                                <td>@{{unidad.Nom_unidad}}</td>
                                <td>@{{unidad.Total_animales}}</td>
                                @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor')
                                <td>
                                    <a class="btn btn-success" v-bind:href="'http://127.0.0.1:8000/unidad/'+ unidad.Id_unidad"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <span style="margin-left: 10px;" v-if="unidad.Borrar =='Si'" class="btn btn-danger" v-on:click="eliminarUnidad(unidad.Id_unidad)"><i class="fa-solid fa-trash"></i></span>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
@endif