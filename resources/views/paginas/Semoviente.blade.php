@if (Auth::check() && Auth::user()->name)
@if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante'|| Auth::user()->Tipo_usuario =='Aprendiz')
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row g-3 align-items-center" style="margin-left: 230px;">
        <div class="col-auto">
            <label style="color: white;" for="inputPassword6" class="col-form-label">Buscar Semoviente:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" placeholder="Ingrese Datos A Buscar" v-model="textoSemoviente" v-on:keyup="buscarSemoviente">
        </div>
        <div class="col-auto">
            <span v-if="centroSemoviente.length == 0" class="btn btn-success" v-on:click="buscarSemoviente"><img src="{{ asset('img/eye-icon-1.png')}}" style="width: 30px;"></span>
        </div>
        <ul class="navbar-nav ms-auto" style="margin-top:-10px">
            <li class="nav-item dropdown" style="margin-left: 450px;margin-top:-30px">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                    <i class="fa-solid fa-file-pdf"></i> Generar PDF
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" style="color: black;text-decoration: none;cursor: pointer" href="{{ route('generar-pdf', ['Nom_unidad' => 'Unidad De Caprinos']) }}">Unidad De Caprinos</a></li>
                    <li><a class="dropdown-item" style="color: black;text-decoration: none;cursor: pointer;" href="{{ route('generar-pdf', ['Nom_unidad' => 'Unidad De Ganaderia']) }}">Unidad De Ganaderia</a></li>
                    <li> <a class="dropdown-item" style="color: black;text-decoration: none;cursor: pointer;" href="{{ route('generar-pdf', ['Nom_unidad' => 'Unidad De Ovinos']) }}">Unidad De Ovinos</a></li>
                    <li> <a class="dropdown-item" style="color: black;text-decoration: none;cursor: pointer" href="{{ route('generar-pdf', ['Nom_unidad' => 'Unidad De Cunicultura']) }}">Unidad De Cunicultura</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-30">
            <div class="card" style="max-width: 100%; border: 3px ridge white">
                <h1 style="margin: auto;font-size:24px;margin-top:10px">Consultar Registro De Semovientes</h1>
                <nav aria-label="page navegation example" style="margin-left: 10px;">
                    <ul class="pagination">
                        <li v-bind:class="ocultarMostrarAnterior" v-on:click="anterior2" class="page-link" href="#" aria-label="previous">
                            <span arial-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-for="(pagina, index) in paginas" v-bind:class="botones[index]">
                            <a class="page-link" href="#" v-on:click="paginar2(pagina)">@{{pagina}}</a>
                        </li>
                        <li v-if="paginas == 1" class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-else v-bind:class="ocultarMostrarSiguiente">
                            <a v-on:click="siguiente2" class="page-link" hfref="#" arial-label="Next">
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
                                    <th scope="col">Placa Inventario</th>
                                    <th scope="col">Nombre Unidad</th>
                                    <th scope="col">Identificación Semoviente</th>
                                    <th scope="col">Nombre Raza</th>
                                    <th scope="col">Tipo Semoviente</th>
                                    <th scope="col">Sexo Semoviente</th>
                                    <th scope="col">Fecha Nacimiento</th>
                                    <th scope="col">Peso Nacimiento (KG)</th>
                                    <th scope="col">Fecha Ingreso</th>
                                    <th scope="col">Tipo Ingreso</th>
                                    <th scope="col">Placa Inventario Padre</th>
                                    <th scope="col">Placa Inventario Madre</th>
                                    <th scope="col">Valor Semoviente (COP)</th>
                                    @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')

                                    <th scope="col">Activo</th>
                                    <th scope="col">Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for="(semoviente,index) in centroSemoviente" v-show="index >= desde && index < hasta">
                                    <td>@{{semoviente.Placa_inventario}}</td>
                                    <td>@{{semoviente.Nom_unidad}}</td>
                                    <td>@{{semoviente.Nom_semoviente}}</td>
                                    <td>@{{semoviente.Nom_raza}}</td>
                                    <td>@{{semoviente.Tipo_semoviente}}</td>
                                    <td>@{{semoviente.Sexo_semoviente}}</td>
                                    <td>@{{semoviente.Fech_nacimiento}}</td>
                                    <td>@{{semoviente.Peso_nacimiento}}</td>
                                    <td>@{{semoviente.Fech_ingreso}}</td>
                                    <td>@{{semoviente.Tipo_ingreso}}</td>
                                    <td>@{{semoviente.Placa_padre}}</td>
                                    <td>@{{semoviente.Placa_madre}}</td>
                                    <td>$@{{ parseFloat(semoviente.Valor_semoviente).toLocaleString(undefined,) }}</td>
                                    @if (Auth::check() && Auth::user()->Tipo_usuario == 'Instructor' || Auth::user()->Tipo_usuario =='Pasante')
                                    <td>
                                        <button v-if="semoviente.Activo == 'Si'" style="width: 50px;" class="btn btn-success" v-on:click="activarDesactivarSemoviente(semoviente.Id_semoviente, semoviente.Activo)"><i class="fa-solid fa-check"></i></button>
                                        <button v-if="semoviente.Activo == 'No'" style="width: 50px;" class="btn btn-danger" v-on:click="activarDesactivarSemoviente(semoviente.Id_semoviente, semoviente.Activo)"><i class="fa-solid fa-xmark"></i></button>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" v-bind:href="'http://127.0.0.1:8000/semoviente/'+ semoviente.Id_semoviente"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <span style="margin-top: -60px;margin-left:50px" v-if="semoviente.Borrar =='Si'" class="btn btn-danger" v-on:click="eliminarSemoviente(semoviente.Id_semoviente)"><i class="fa-solid fa-trash"></i></span>
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