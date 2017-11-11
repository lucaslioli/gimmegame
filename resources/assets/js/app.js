
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import VueRouter from 'vue-router'

import Stepper from './components/Stepper.vue'

Vue.use(Vuetify)
Vue.use(VueRouter)

Vue.component('home', require('./components/home/Index.vue'));

const routes = [
  { title: 'Stteper 1' , icon: 'home', path: '/', component: Stepper}
]

const router = new VueRouter({
  routes: routes,
  linkActiveClass: 'list__tile--active'
})

const app = new Vue({
    el: '#app',
    data () {
        return {
            routes: routes,
        }
    },
    router,
});
