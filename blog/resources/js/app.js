/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
Vue.component('almacen-component', require('./components/AlmacenComponent.vue').default);
Vue.component('categoria-component', require('./components/CategoriaComponent.vue').default);
Vue.component('articulo-component', require('./components/ArticuloComponent.vue').default);
// Vue.component('cliente', require('./components/Cliente.vue'));
// Vue.component('proveedor', require('./components/Proveedor.vue'));
// Vue.component('rol', require('./components/Rol.vue'));
// Vue.component('user', require('./components/User.vue'));
// Vue.component('ingreso', require('./components/Ingreso.vue'));
// Vue.component('venta', require('./components/Venta.vue'));
// Vue.component('dashboard', require('./components/Dashboard.vue'));
// Vue.component('consultaingreso', require('./components/ConsultaIngreso.vue'));
// Vue.component('consultaventa', require('./components/ConsultaVenta.vue'));
// Vue.component('ayuda', require('./components/Ayuda.vue'));
// Vue.component('acerca', require('./components/Acerca.vue'));

const app = new Vue({
el: '#app',
data :{
menu : 0,
ruta: 'http://127.0.0.1:8000'
}
});