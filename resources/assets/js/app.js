
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App.vue';
import Create from './components/Create.vue';
import Update from './components/Update.vue';
import Index from './components/Index.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Index
        },
        {
            path: '/create',
            name: 'create',
            component: Create,
        },
        {
            path: '/update/:id',
            name: 'update',
            component: Update,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});