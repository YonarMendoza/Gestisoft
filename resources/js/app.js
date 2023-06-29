/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
const consultaCantidadRazas = "http://127.0.0.1:8000/contarRazas";
const consultaCantidadUnidades = "http://127.0.0.1:8000/contarUnidades";
const consultaCantidadSemovientes = "http://127.0.0.1:8000/contarSemovientes";
const consultaCantidadNovedades = "http://127.0.0.1:8000/contarNovedades";
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
            totalRazas: 0,
            razasPagina: 3,
            totalUnidades: 0,
            unidadesPagina: 3,
            totalSemovientes: 0,
            semovientesPagina: 3,
            //desde
            totalNovedades: 0,
            novedadesPagina: 3,
            paginas: "",
            paginaActual: 1,
            desde: "",
            hasta: "",
            ocultarMostrarAnterior: "",
            ocultarMostrarSiguiente: "",
            botones: [],
            //hasta
        };
    },
    methods: {
        eliminarRaza(Id_raza) {
            //Recibir como parámetro el id del aprendiz

            var eliminar = confirm(
                "¿Está seguro que quiere eliminar el registro?"
            ); //Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios
                    .delete("http://127.0.0.1:8000/raza/" + Id_raza)
                    .then((respuesta) => {
                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data);
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/raza/";
                    });
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
        //desde
        consultaNumeroRazas() {
            axios.get(consultaCantidadRazas).then((respuesta) => {
                this.totalRazas = respuesta.data;
                this.paginas = Math.ceil(this.totalRazas / this.razasPagina);
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
        eliminarUnidad(Id_unidad) {
            //Recibir como parámetro el id del aprendiz

            var eliminar = confirm(
                "¿Está seguro que quiere eliminar el registro?"
            ); //Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios
                    .delete("http://127.0.0.1:8000/unidad/" + Id_unidad)
                    .then((respuesta) => {
                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data);
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/unidad/";
                    });
            }
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
        eliminarSemoviente(Id_semoviente) {
            //Recibir como parámetro el id del aprendiz

            var eliminar = confirm(
                "¿Está seguro que quiere eliminar el registro?"
            ); //Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios
                    .delete("http://127.0.0.1:8000/semoviente/" + Id_semoviente)
                    .then((respuesta) => {
                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data);
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href =
                            "http://127.0.0.1:8000/semoviente/";
                    });
            }
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
        activarDesactivarSemoviente(Id_semoviente,Activo){
            axios.put('http://127.0.0.1:8000/cambiarEstadoSemoviente/',{'Id_semoviente': Id_semoviente, 'Activo': Activo}).then((respuesta)=>{
                window.location.href="http://127.0.0.1:8000/semoviente"
            });
        },
        eliminarNovedad(Id_novedad) {
            //Recibir como parámetro el id del aprendiz

            var eliminar = confirm(
                "¿Está seguro que quiere eliminar el registro?"
            ); //Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios
                    .delete("http://127.0.0.1:8000/novedad/" + Id_novedad)
                    .then((respuesta) => {
                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data);
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/novedad/";
                    });
            }
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

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount("#app");
