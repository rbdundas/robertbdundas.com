/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'
Vue.use(Buefy)

import VueHighlightJS from 'vue-highlightjs'
Vue.use(VueHighlightJS)

window.Vue = require('vue');

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
Vue.component('header-navbar', require('./components/HeaderNavbar.vue').default);
Vue.component('project-card', require('./components/ProjectCard.vue').default);
Vue.component('tile', require('./components/Tile.vue').default);
Vue.component('home-view', require('./components/HomeView.vue').default);
Vue.component('site-footer', require('./components/SiteFooter.vue').default);
Vue.component('post', require('./components/Post.vue').default);
Vue.component('edit-post', require('./components/EditPost.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
