require('./bootstrap');

import Vue from 'vue';
import VueRouter from'vue-router';
import App from './App.vue';
import router from './Router/index';

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    components: {
        App
    },
});
