
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
import Vuetify from 'vuetify'
import VDateRange from 'vuetify-daterange-picker';


Vue.use(Vuetify)
Vue.use(VDateRange);

// import HighchartsVue from 'highcharts-vue'
// Vue.use(HighchartsVue)
// Vue.use(HighchartsVue, {tagName: ['charts']})


// Vue.use(HighchartsVue)
// index.js or main.js
// import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader


// const textField = new MDCTextField(document.querySelector('.mdc-text-field'));

/**
Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//  Templates
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('layout-nav', require('./components/layouts/Layout.vue'));
Vue.component('nav-bar', require('./components/templates/Nav.vue'));
Vue.component('comp-dashboard', require('./components/templates/Dashboard.vue'));

// Clientes
Vue.component('comp-cliente', require('./components/clientes/Cliente2.vue'));
Vue.component('cliente-create', require('./components/clientes/ClienteCreate.vue'));
Vue.component('cliente-edit', require('./components/clientes/ClienteEdit.vue'));
Vue.component('cliente-show', require('./components/clientes/ClienteShow.vue'));
Vue.component('cliente-table', require('./components/clientes/ClienteTable.vue'));

// Promos
Vue.component('comp-promos', require('./components/promos/Promos.vue'));
Vue.component('promo-create', require('./components/promos/PromoCreate.vue'));
Vue.component('promo-edit', require('./components/promos/PromoEdit.vue'));
Vue.component('promo-show', require('./components/promos/PromoShow.vue'));

// Auto
Vue.component('comp-autos', require('./components/autos/Autos.vue'));
Vue.component('auto-create', require('./components/autos/AutoCreate.vue'));
Vue.component('auto-edit', require('./components/autos/AutoEdit.vue'));
Vue.component('auto-show', require('./components/autos/AutoShow.vue'));

// Reservas
Vue.component('comp-reservas', require('./components/reservas/Reservas.vue'));
Vue.component('pre-reserva', require('./components/reservas/PreReserva.vue'));
Vue.component('reserva-create', require('./components/reservas/ReservaCreate.vue'));
Vue.component('reserva-edit', require('./components/reservas/ReservaEdit.vue'));
Vue.component('reserva-show', require('./components/reservas/ReservaShow.vue'));


const app = new Vue({
    el: '#app'
});
