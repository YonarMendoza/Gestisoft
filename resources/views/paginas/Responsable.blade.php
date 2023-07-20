@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')
@extends('layouts.app')
@section('content')
<div class="container">
    <!-- Barra de búsqueda -->
    <div class="row g-3 align-items-center" style="margin-left: 230px;">
        <div class="col-auto" style="color: white;">
            <label for="inputPassword6" class="col-form-label">Buscar Responsable:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" placeholder="Ingrese Datos A Buscar" v-model="textoResponsable" v-on:keyup="buscarResponsable">
        </div>
        <div class="col-auto">
            <span v-if="centroResponsable.length === 0" class="btn btn-success" v-on:click="buscarResponsable"><img src="{{ asset('img/eye-icon-1.png')}}" style="width: 30px;"></span>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="border: 3px ridge white;">
                <h1 style="margin: auto; font-size: 24px; margin-top: 10px;">Consultar Registro De Responsables</h1>
                <nav aria-label="page navegation example" style="margin-left: 10px;">
                    <ul class="pagination">
                        <li v-bind:class="ocultarMostrarAnterior" v-on:click="anterior5" class="page-link" href="#" aria-label="previous">
                            <span arial-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-for="(pagina, index) in paginas" v-bind:class="botones[index]">
                            <a class="page-link" href="#" v-on:click="paginar5(pagina)">@{{pagina}}</a>
                        </li>
                        <li v-if="paginas == 1" class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-else v-bind:class="ocultarMostrarSiguiente">
                            <a v-on:click="siguiente5" class="page-link" hfref="#" arial-label="Next">
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
                    <div class="table-responsive">
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre Responsable</th>
                                    <th scope="col">Correo Responsable</th>
                                    <th scope="col">Telefono Responsable</th>
                                    <th scope="col">Nombre Unidad</th>
                                    @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')

                                    <th scope="col">Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(Responsable,index) in centroResponsable" v-show="index >= desde && index < hasta">
                                    <td>@{{Responsable.Nom_responsable}}</td>
                                    <td>@{{Responsable.Correo_responsable}}</td>
                                    <td>@{{Responsable.Tel_responsable}}</td>
                                    <td>@{{Responsable.Nom_unidad}}</td>
                                    @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')

                                    <td>
                                        <a class="btn btn-success" v-bind:href="'http://127.0.0.1:8000/responsable/'+ Responsable.Id_responsable"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <span style="margin-left: 50px;margin-top:-63px" v-if="Responsable.Borrar =='Si'" class="btn btn-danger" v-on:click="eliminarResponsable(Responsable.Id_responsable)"><i class="fa-solid fa-trash"></i></span>
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
</div>
@endsection
@endif
@endif