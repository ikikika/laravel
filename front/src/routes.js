import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/auth/Login.vue'
import Register from './components/auth/Register.vue'
import Feed from './components/Feed'

Vue.use(VueRouter)

const router = new VueRouter({
  routes: [
    {
      path: "/login",
      component: Login,
      meta: {
        forVisitors: true
      }
    },
    {
      path: "/register",
      component: Register,
      meta: {
        forVisitors: true
      }
    },
    {
      path: '/feed',
      component: Feed,
      meta: {
        forAuth: true
      }
    },
    {
      path: '/products/create',
      component: require('./components/product/Create.vue').default,
      meta: {
        forAuth: true
      }
    }
  ],
  //specify active class
  linkActiveClass: 'active',

  mode: 'history'
})

export default router
