import Vue from 'vue'

import VueRouter from 'vue-router'

import Welcome from "./views/index.vue"

import Login from "./views/auth/login.vue"

import NotFound from "./errors/404.vue"

Vue.use(VueRouter)

const routes = [
    { 
        path: '/', 
        name: 'welcome',
        component: Welcome,
        meta: {
            title: "Seja bem vindo",
            onlyGuest: true
        },
    },
    { 
        path: '/login', 
        name: 'login',
        component: () => Login,
        meta: {
            title: "Entrar",
            subtitle: "Login",
            onlyGuest: true
            
        },
    },
    
    {
        path: '*',
        name:'404', 
        component: NotFound
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router