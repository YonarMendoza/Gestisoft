/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    data(){

        return{
            
            textoRaza:"",
            centroRaza:[],
        }
       
    },
    methods: {
        eliminarRaza(Id_raza){//Recibir como parámetro el id del aprendiz

            var eliminar = confirm("¿Está seguro que quiere eliminar el registro?")//Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios.delete('http://127.0.0.1:8000/raza/' + Id_raza).then((respuesta) => {

                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data)
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/raza/"

                })
            }

        },
        buscarRaza(){
            if(this.textoRaza.length > 0){
                axios.get('http://127.0.0.1:8000/centroRazaBuscar/'+this.textoRaza).then((respuesta)=>{
                    this.centroRaza = respuesta.data
                })
            }else{
                console.log("Esta buscando todo")
                axios.get('http://127.0.0.1:8000/centroRazaBuscar/-').then((respuesta)=>{
                    this.centroRaza= respuesta.data
                })
            }

        },
        eliminarUnidad(Id_unidad){//Recibir como parámetro el id del aprendiz

            var eliminar = confirm("¿Está seguro que quiere eliminar el registro?")//Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios.delete('http://127.0.0.1:8000/unidad/' + Id_unidad).then((respuesta) => {

                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data)
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/unidad/"

                })
            }

        },
        eliminarSemoviente(Id_semoviente){//Recibir como parámetro el id del aprendiz

            var eliminar = confirm("¿Está seguro que quiere eliminar el registro?")//Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios.delete('http://127.0.0.1:8000/semoviente/' + Id_semoviente).then((respuesta) => {

                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data)
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/semoviente/"

                })
            }

        },
        eliminarNovedad(Id_novedad){//Recibir como parámetro el id del aprendiz

            var eliminar = confirm("¿Está seguro que quiere eliminar el registro?")//Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios.delete('http://127.0.0.1:8000/novedad/' + Id_novedad).then((respuesta) => {

                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data)
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/novedad/"

                })
            }



        },
        eliminarMortalidad(Id_mortalidad){//Recibir como parámetro el id del aprendiz

            var eliminar = confirm("¿Está seguro que quiere eliminar el registro?")//Preguntar si quiere eliminar

            if (eliminar == true) {
                //axios es la libreria que viene instalada con Laravel para las peticiones de tipo ajax
                //para eliminar un dato se utiliza la funcion delete de axios y se pasa como argumento
                //la ruta creada para el contralador + el identificador del aprendiz
                axios.delete('http://127.0.0.1:8000/mortalidad/' + Id_mortalidad).then((respuesta) => {

                        //Se imprime la respuesta de la peticion
                        console.log(respuesta.data)
                        //Se direcciona para que vuelva a cargar los aprendices que quedaron
                        window.location.href = "http://127.0.0.1:8000/mortalidad/"

                })
            }

        }
    }
    
    



});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

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

app.mount('#app');
