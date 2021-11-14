/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('informacion-component', require('./components/InformacionComponent.vue').default);
Vue.component('facultades-component', require('./components/FacultadesComponent.vue').default);
Vue.component('enlaces-component', require('./components/EnlacesComponent.vue').default);
Vue.component('posgradoFacultad', require('./components/Publico/PosgradoFacultad.vue').default);
Vue.component('opcionesFacultades', require('./components/Publico/OpcionesFacultades.vue').default);

Vue.component('modalidades-component', require('./components/ModalidadesComponent.vue').default);
Vue.component('tipo-duracions-component', require('./components/TipoDuracionsComponent.vue').default);
Vue.component('tipo-programas-component', require('./components/TipoProgramasComponent.vue').default);
Vue.component('diplomados-component', require('./components/DiplomadosComponent.vue').default);
Vue.component('posgrados-component', require('./components/PosgradosComponent.vue').default);
Vue.component('tesis-component', require('./components/TesisComponent.vue').default);
Vue.component('equipo-trabajo-component', require('./components/EquipoTrabajoComponent.vue').default);
Vue.component('galery-component', require('./components/GaleryComponent.vue').default);
Vue.component('historico-component', require('./components/HistoricoComponent.vue').default);
Vue.component('noticias-component', require('./components/NoticiasComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
