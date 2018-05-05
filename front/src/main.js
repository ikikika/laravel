import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'

import VueResource from 'vue-resource'

import Auth from './packages/auth/Auth.js'

Vue.use(VueResource) //install vue-resource first amd configure like this
Vue.use(Auth) //register auth package globally

Router.beforeEach(
  (to, from, next) => { //to is where we want to go, from is current route, next is function that muct be called no matter what
    if( to.matched.some(record => record.meta.forVisitors) ){
      if( Vue.auth.isAuthenticated ){
        next({
          path: '/feed'
        })
      } else { next() }
    } else { next() }
  }
)

new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
})
