
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

//views

Vue.component('my-application', require('./views/index.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import store from "./store";

import router from './router.js'

router.beforeEach((to, from, next) => {
    console.log(to)

    store.commit("SET_FORM_ERRORS", []);
    store.commit("SET_ERROR", null);

    const loggedIn = localStorage.getItem('user');
    
    if (to.matched.some(record => record.meta.requiresAuth) && !loggedIn) {
        next('/login');
    }
    else if(to.meta.onlyGuest && loggedIn ){
      next('/dashboard');
      
    }
    else { next()}
    
 
    
 })
 

window.app = new Vue({
    el: '#app',
    store,
    router,
    data: () => ({
        message: 'loaded'
    }),
    created(){  

        const userInfo = localStorage.getItem('user')

        if (userInfo) {
            const userData = JSON.parse(userInfo)
            this.$store.commit('auth/SET_USER', userData)
        }

        else this.$store.commit('auth/CLEAR')
        axios.interceptors.response.use(
            response => response,
            error => {
                if(error.response){
                    if (error.response.status === 422) {
                        this.$store.commit("SET_FORM_ERRORS", error.response.data.errors);
                    }
    
                    if (error.response.status === 401) {
                        this.$store.commit("auth/CLEAR");
                        this.$router.push('/login')
                        
                    } 
    
                    this.$store.commit("SET_ERROR", error);
                    
                } else if (error.request) {
           
                     console.log(error.request);
                } else {
                   
                    console.log('Error', error.message);
                }

                console.log(error.config);

                this.$store.commit("SET_IS_LOADING", false);
                this.$store.dispatch(
                'toast', 
                {
                    type: "error", header: `Error` ,
                    body: this.$store.getters['displayError']
                })                
                
                return Promise.reject(error);                
            }
        );

        axios.interceptors.request.use(function(config) {
            config.headers.common = {
                Authorization: `Bearer ${localStorage.getItem("authToken")}`,
                "Content-Type": "application/json",
                Accept: "application/json"
            };
        
            return config;
        });
    }
});


const app = new Vue({
    el: '#app'
});
