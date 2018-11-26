
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
import Vuetify from 'vuetify'
 
Vue.use(Vuetify)

// index.js or main.js
// import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader


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
Vue.component('comp-cliente', require('./components/clientes/Cliente.vue'));
Vue.component('cliente-create', require('./components/clientes/ClienteCreate.vue'));
Vue.component('cliente-edit', require('./components/clientes/ClienteEdit.vue'));
Vue.component('cliente-show', require('./components/clientes/ClienteShow.vue'));
Vue.component('cliente-table', require('./components/clientes/ClienteTable.vue'));

// 


const app = new Vue({
    el: '#app'
});
