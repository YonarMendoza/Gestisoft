/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";
import Swal from 'sweetalert2';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
const consultaCantidadRazas = "http://127.0.0.1:8000/contarRazas";
const consultaCantidadUnidades = "http://127.0.0.1:8000/contarUnidades";
const consultaCantidadSemovientes = "http://127.0.0.1:8000/contarSemovientes";
const consultaCantidadNovedades = "http://127.0.0.1:8000/contarNovedades";
const consultaCantidadUsuarios = "http://127.0.0.1:8000/contarUsuarios";
const consultaCantidadResponsables = "http://127.0.0.1:8000/contarResponsables";
const app = createApp({
    data() {
        return {
            textoRaza: "",
            centroRaza: [],
            textoUnidad: "",
            centroUnidad: [],
            textoSemoviente: "",
            centroSemoviente: [],
            textoNovedad: "",
            centroNovedad: [],
            textoUsuario: '',
            centroUsuario: [],
            textoResponsable: "",
            centroResponsable: [],
            totalUsuarios: 0,
            usuariosPagina: 3,
            totalResponsables: 0,
            responsablesPagina: 3,
            totalRazas: 0,
            razasPagina: 3,
            totalUnidades: 0,
            unidadesPagina: 3,
            totalSemovientes: 0,
            semovientesPagina: 3,
            totalNovedades: 0,
            novedadesPagina: 3,
            paginas: "",
            paginaActual: 1,
            desde: "",
            hasta: "",
            ocultarMostrarAnterior: "",
            ocultarMostrarSiguiente: "",
            botones: [],
        };
    },
    methods: {
        eliminarRaza(id_raza) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              });
              
              swalWithBootstrapButtons.fire({
                title: '¿Está seguro que quiere eliminar el registro?',
                text: "¡No podrá revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'Su registro ha sido eliminado.',
                    'success'
                  ).then(() => {
                    axios
                      .delete(`http://127.0.0.1:8000/raza/${id_raza}`)
                      .then((respuesta) => {
                        console.log(respuesta.data);
                        window.location.href = "http://127.0.0.1:8000/raza/";
                      });
                  });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Su registro esta seguro',
                    'error'
                  );
                }
              });
        },
        Guardarregistro() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Su Registro Ha Sido Guardado',
                showConfirmButton: false,
                timer: 1500
              })
        },
        Editarregistro() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Su Registro Ha Sido Actualizado',
                showConfirmButton: false,
                timer: 1500
              })
        },
        eliminarResponsable(id_responsable) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              });
              
              swalWithBootstrapButtons.fire({
                title: '¿Está seguro que quiere eliminar el registro?',
                text: "¡No podrá revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'Su registro ha sido eliminado.',
                    'success'
                  ).then(() => {
                    axios
                      .delete(`http://127.0.0.1:8000/responsable/${id_responsable}`)
                      .then((respuesta) => {
                        console.log(respuesta.data);
                        window.location.href = "http://127.0.0.1:8000/responsable/";
                      });
                  });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Su registro esta seguro',
                    'error'
                  );
                }
              });
          },

        buscarResponsable() {
            if (this.textoResponsable.length > 0) {
                axios
                    .get(
                        "http://127.0.0.1:8000/centroResponsableBuscar/" +
                        this.textoResponsable
                    )
                    .then((respuesta) => {
                        this.centroResponsable = respuesta.data;
                    });
                this.consultaNumeroResponsables();
                this.paginar5(this.paginaActual);
                return this.centroResponsable;
            } else {
                console.log("Esta buscando todo");
                axios
                    .get("http://127.0.0.1:8000/centroResponsableBuscar/-")
                    .then((respuesta) => {
                        this.centroResponsable = respuesta.data;
                    });
                this.consultaNumeroResponsables();
                this.paginar5(this.paginaActual);
                return this.centroResponsable;
            }
        },
        buscarRaza() {
            if (this.textoRaza.length > 0) {
                axios
                    .get(
                        "http://127.0.0.1:8000/centroRazaBuscar/" +
                        this.textoRaza
                    )
                    .then((respuesta) => {
                        this.centroRaza = respuesta.data;
                    });
                this.consultaNumeroRazas();
                this.paginar(this.paginaActual);
                return this.centroRaza;
            } else {
                console.log("Esta buscando todo");
                axios
                    .get("http://127.0.0.1:8000/centroRazaBuscar/-")
                    .then((respuesta) => {
                        this.centroRaza = respuesta.data;
                    });
                this.consultaNumeroRazas();
                this.paginar(this.paginaActual);
                return this.centroRaza;
            }
        },
        eliminarUsuario(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              });
              
              swalWithBootstrapButtons.fire({
                title: '¿Está seguro que quiere eliminar el registro?',
                text: "¡No podrá revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'Su registro ha sido eliminado.',
                    'success'
                  ).then(() => {
                    axios
                      .delete(`http://127.0.0.1:8000/usuarios/${id}`)
                      .then((respuesta) => {
                        console.log(respuesta.data);
                        window.location.href = "http://127.0.0.1:8000/usuarios/";
                      });
                  });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Su registro esta seguro',
                    'error'
                  );
                }
              });
        },
        buscarUsuario() {
            if (this.textoUsuario.length > 0) {
                axios
                    .get(
                        "http://127.0.0.1:8000/centroUsuarioBuscar/" +
                        this.textoUsuario
                    )
                    .then((respuesta) => {
                        this.centroUsuario = respuesta.data;
                    });
                this.consultaNumeroUsuarios();
                this.paginar(this.paginaActual);
                return this.centroUsuario;
            } else {
                console.log("Esta buscando todo");
                axios
                    .get("http://127.0.0.1:8000/centroUsuarioBuscar/-")
                    .then((respuesta) => {
                        this.centroUsuario = respuesta.data;
                    });
                this.consultaNumeroUsuarios();
                this.paginar(this.paginaActual);
                return this.centroUsuario;
            }
        },
        //desde
        consultaNumeroRazas() {
            axios.get(consultaCantidadRazas).then((respuesta) => {
                this.totalRazas = respuesta.data;
                this.paginas = Math.ceil(this.totalRazas / this.razasPagina);
            });
        },
        consultaNumeroUsuarios() {
            axios.get(consultaCantidadUsuarios).then((respuesta) => {
                this.totalUsuarios = respuesta.data;
                this.paginas = Math.ceil(this.totalUsuarios / this.usuariosPagina);
            });
        },
        //hasta
        consultaNumeroUnidades() {
            axios.get(consultaCantidadUnidades).then((respuesta) => {
                this.totalUnidades = respuesta.data;
                this.paginas = Math.ceil(
                    this.totalUnidades / this.unidadesPagina
                );
            });
        },
        consultaNumeroSemovientes() {
            axios.get(consultaCantidadSemovientes).then((respuesta) => {
                this.totalSemovientes = respuesta.data;
                this.paginas = Math.ceil(
                    this.totalSemovientes / this.semovientesPagina
                );
            });
        },
        consultaNumeroNovedades() {
            axios.get(consultaCantidadNovedades).then((respuesta) => {
                this.totalNovedades = respuesta.data;
                this.paginas = Math.ceil(
                    this.totalNovedades / this.novedadesPagina
                );
            });
        },
        consultaNumeroResponsables() {
            axios.get(consultaCantidadResponsables).then((respuesta) => {
                this.totalResponsables = respuesta.data;
                this.paginas = Math.ceil(
                    this.totalResponsables / this.responsablesPagina
                );
            });
        },
        //desde
        paginar(pagina) {
            this.paginaActual = pagina;
            this.desde = (this.paginaActual - 1) * this.razasPagina;
            this.hasta = this.paginaActual * this.razasPagina;

            if (this.paginaActual == 1) {
                this.ocultarMostrarAnterior = "page-item disabled";
            } else {
                this.ocultarMostrarAnterior = "page-item";
            }
            if (this.paginaActual == this.paginas) {
                this.ocultarMostrarSiguiente = "page-item disabled";
            } else {
                this.ocultarMostrarSiguiente = "page-item";
            }
            for (var i = 0; i <= this.paginas; i++) {
                if (i + 1 == this.paginaActual) {
                    this.botones[i] = "page-item active";
                } else {
                    this.botones[i] = "page-item";
                }
            }
        },
        //hasta
        paginar1(pagina) {
            this.paginaActual = pagina;
            this.desde = (this.paginaActual - 1) * this.unidadesPagina;
            this.hasta = this.paginaActual * this.unidadesPagina;

            if (this.paginaActual == 1) {
                this.ocultarMostrarAnterior = "page-item disabled";
            } else {
                this.ocultarMostrarAnterior = "page-item";
            }
            if (this.paginaActual == this.paginas) {
                this.ocultarMostrarSiguiente = "page-item disabled";
            } else {
                this.ocultarMostrarSiguiente = "page-item";
            }
            for (var i = 0; i <= this.paginas; i++) {
                if (i + 1 == this.paginaActual) {
                    this.botones[i] = "page-item active";
                } else {
                    this.botones[i] = "page-item";
                }
            }
        },
        paginar2(pagina) {
            this.paginaActual = pagina;
            this.desde = (this.paginaActual - 1) * this.semovientesPagina;
            this.hasta = this.paginaActual * this.semovientesPagina;

            if (this.paginaActual == 1) {
                this.ocultarMostrarAnterior = "page-item disabled";
            } else {
                this.ocultarMostrarAnterior = "page-item";
            }
            if (this.paginaActual == this.paginas) {
                this.ocultarMostrarSiguiente = "page-item disabled";
            } else {
                this.ocultarMostrarSiguiente = "page-item";
            }
            for (var i = 0; i <= this.paginas; i++) {
                if (i + 1 == this.paginaActual) {
                    this.botones[i] = "page-item active";
                } else {
                    this.botones[i] = "page-item";
                }
            }
        },
        paginar3(pagina) {
            this.paginaActual = pagina;
            this.desde = (this.paginaActual - 1) * this.novedadesPagina;
            this.hasta = this.paginaActual * this.novedadesPagina;

            if (this.paginaActual == 1) {
                this.ocultarMostrarAnterior = "page-item disabled";
            } else {
                this.ocultarMostrarAnterior = "page-item";
            }
            if (this.paginaActual == this.paginas) {
                this.ocultarMostrarSiguiente = "page-item disabled";
            } else {
                this.ocultarMostrarSiguiente = "page-item";
            }
            for (var i = 0; i <= this.paginas; i++) {
                if (i + 1 == this.paginaActual) {
                    this.botones[i] = "page-item active";
                } else {
                    this.botones[i] = "page-item";
                }
            }
        },
        paginar4(pagina) {
            this.paginaActual = pagina;
            this.desde = (this.paginaActual - 1) * this.usuariosPagina;
            this.hasta = this.paginaActual * this.usuariosPagina;

            if (this.paginaActual == 1) {
                this.ocultarMostrarAnterior = "page-item disabled";
            } else {
                this.ocultarMostrarAnterior = "page-item";
            }
            if (this.paginaActual == this.paginas) {
                this.ocultarMostrarSiguiente = "page-item disabled";
            } else {
                this.ocultarMostrarSiguiente = "page-item";
            }
            for (var i = 0; i <= this.paginas; i++) {
                if (i + 1 == this.paginaActual) {
                    this.botones[i] = "page-item active";
                } else {
                    this.botones[i] = "page-item";
                }
            }
        },
        paginar5(pagina) {
            this.paginaActual = pagina;
            this.desde = (this.paginaActual - 1) * this.responsablesPagina;
            this.hasta = this.paginaActual * this.responsablesPagina;

            if (this.paginaActual == 1) {
                this.ocultarMostrarAnterior = "page-item disabled";
            } else {
                this.ocultarMostrarAnterior = "page-item";
            }
            if (this.paginaActual == this.paginas) {
                this.ocultarMostrarSiguiente = "page-item disabled";
            } else {
                this.ocultarMostrarSiguiente = "page-item";
            }
            for (var i = 0; i <= this.paginas; i++) {
                if (i + 1 == this.paginaActual) {
                    this.botones[i] = "page-item active";
                } else {
                    this.botones[i] = "page-item";
                }
            }
        },
        //desde
        anterior() {
            this.paginaActual = this.paginaActual - 1;
            this.paginar(this.paginaActual);
        },
        //hasta
        siguiente() {
            this.paginaActual = this.paginaActual + 1;
            this.paginar(this.paginaActual);
        },
        anterior1() {
            this.paginaActual = this.paginaActual - 1;
            this.paginar1(this.paginaActual);
        },
        siguiente1() {
            this.paginaActual = this.paginaActual + 1;
            this.paginar1(this.paginaActual);
        },
        anterior2() {
            this.paginaActual = this.paginaActual - 1;
            this.paginar2(this.paginaActual);
        },
        siguiente2() {
            this.paginaActual = this.paginaActual + 1;
            this.paginar2(this.paginaActual);
        },
        anterior3() {
            this.paginaActual = this.paginaActual - 1;
            this.paginar3(this.paginaActual);
        },
        siguiente3() {
            this.paginaActual = this.paginaActual + 1;
            this.paginar3(this.paginaActual);
        },
        anterior4() {
            this.paginaActual = this.paginaActual - 1;
            this.paginar4(this.paginaActual);
        },
        siguiente4() {
            this.paginaActual = this.paginaActual + 1;
            this.paginar4(this.paginaActual);
        },
        anterior5() {
            this.paginaActual = this.paginaActual - 1;
            this.paginar4(this.paginaActual);
        },
        siguiente5() {
            this.paginaActual = this.paginaActual + 1;
            this.paginar4(this.paginaActual);
        },
        eliminarUnidad(id_unidad) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              });
              
              swalWithBootstrapButtons.fire({
                title: '¿Está seguro que quiere eliminar el registro?',
                text: "¡No podrá revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'Su registro ha sido eliminado.',
                    'success'
                  ).then(() => {
                    axios
                      .delete(`http://127.0.0.1:8000/unidad/${id_unidad}`)
                      .then((respuesta) => {
                        console.log(respuesta.data);
                        window.location.href = "http://127.0.0.1:8000/unidad/";
                      });
                  });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Su registro esta seguro',
                    'error'
                  );
                }
              });
        },
        buscarUnidad() {
            if (this.textoUnidad.length > 0) {
                axios
                    .get(
                        "http://127.0.0.1:8000/centroUnidadBuscar/" +
                        this.textoUnidad
                    )
                    .then((respuesta) => {
                        this.centroUnidad = respuesta.data;
                    });
                //desde
                this.consultaNumeroUnidades();
                this.paginar1(this.paginaActual);
                return this.centroUnidad;
                //hasta
            } else {
                console.log("Esta buscando todo");
                axios
                    .get("http://127.0.0.1:8000/centroUnidadBuscar/-")
                    .then((respuesta) => {
                        this.centroUnidad = respuesta.data;
                    });
                //desde
                this.consultaNumeroUnidades();
                this.paginar1(this.paginaActual);
                return this.centroUnidad;
                //hasta
            }
        },
        eliminarSemoviente(id_semoviente) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              });
              
              swalWithBootstrapButtons.fire({
                title: '¿Está seguro que quiere eliminar el registro?',
                text: "¡No podrá revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'Su registro ha sido eliminado.',
                    'success'
                  ).then(() => {
                    axios
                      .delete(`http://127.0.0.1:8000/semoviente/${id_semoviente}`)
                      .then((respuesta) => {
                        console.log(respuesta.data);
                        window.location.href = "http://127.0.0.1:8000/semoviente/";
                      });
                  });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Su registro esta seguro',
                    'error'
                  );
                }
              });
        },
        buscarSemoviente() {
            if (this.textoSemoviente.length > 0) {
                axios
                    .get(
                        "http://127.0.0.1:8000/centroSemovienteBuscar/" +
                        this.textoSemoviente
                    )
                    .then((respuesta) => {
                        this.centroSemoviente = respuesta.data;
                    });
                this.consultaNumeroSemovientes();
                this.paginar2(this.paginaActual);
                return this.centroSemoviente;
            } else {
                console.log("Esta buscando todo");
                axios
                    .get("http://127.0.0.1:8000/centroSemovienteBuscar/-")
                    .then((respuesta) => {
                        this.centroSemoviente = respuesta.data;
                    });
                this.consultaNumeroSemovientes();
                this.paginar2(this.paginaActual);
                return this.centroSemoviente;
            }
        },
        activarDesactivarSemoviente(Id_semoviente, Activo) {
            axios.put('http://127.0.0.1:8000/cambiarEstadoSemoviente/', { 'Id_semoviente': Id_semoviente, 'Activo': Activo }).then((respuesta) => {
                window.location.href = "http://127.0.0.1:8000/semoviente"
            });
        },
        eliminarNovedad(id_novedad) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              });
              
              swalWithBootstrapButtons.fire({
                title: '¿Está seguro que quiere eliminar el registro?',
                text: "¡No podrá revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'Su registro ha sido eliminado.',
                    'success'
                  ).then(() => {
                    axios
                      .delete(`http://127.0.0.1:8000/novedad/${id_novedad}`)
                      .then((respuesta) => {
                        console.log(respuesta.data);
                        window.location.href = "http://127.0.0.1:8000/novedad/";
                      });
                  });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Su registro esta seguro',
                    'error'
                  );
                }
              });
        },
        buscarNovedad() {
            if (this.textoNovedad.length > 0) {
                axios
                    .get(
                        "http://127.0.0.1:8000/centroNovedadBuscar/" +
                        this.textoNovedad
                    )
                    .then((respuesta) => {
                        this.centroNovedad = respuesta.data;
                    });
                this.consultaNumeroNovedades();
                this.paginar3(this.paginaActual);
                return this.centroNovedad;
            } else {
                console.log("Esta buscando todo");
                axios
                    .get("http://127.0.0.1:8000/centroNovedadBuscar/-")
                    .then((respuesta) => {
                        this.centroNovedad = respuesta.data;
                    });
                this.consultaNumeroNovedades();
                this.paginar3(this.paginaActual);
                return this.centroNovedad;
            }
        },
    },
});

import ExampleComponent from "./components/ExampleComponent.vue";
app.component("example-component", ExampleComponent);
app.mount("#app");
