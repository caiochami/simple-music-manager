
require('./bootstrap');
window.Vue = require('vue');

// Install BootstrapVue

import 'bootstrap/dist/css/bootstrap.css'


Vue.component('my-application', require('./views/index.vue'));

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


// const app = new Vue({
//     el: '#app'
// });
