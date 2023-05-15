/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

import Vue from 'vue';


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Toasted from 'vue-toasted';
Vue.use(Toasted);

import Multiselect from 'vue-multiselect';
Vue.component('multiselect', Multiselect);

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import VuePageTransition from 'vue-page-transition';
Vue.use(VuePageTransition);


import routes from './router';
import store from './store';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('vue-multiselect', window.VueMultiselect.default);

Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('loader', require('./components/Loader.vue').default);
Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('footerBottom', require('./components/Footer.vue').default);

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://laravue.test/';
// axios.defaults.baseURL = 'http://moviesaurus.herokuapp.com/';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    router: new VueRouter(routes),
    data: {
        token: 'this is your token',
    },
});