import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'

import VueResource from 'vue-resource'

import Auth from './packages/auth/Auth.js'

Vue.use(VueResource) //install vue-resource first amd configure like this
Vue.use(Auth) //register auth package globally

Vue.http.options.root = "http://localhost:8000"
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken()
Vue.http.interceptors.push((request, next) => {
    next(response=>{
      if( response.status == 404 ){
          swal(response.status.toString(), response.body.error, "error")
      } else if( response.status == 500  ){
          swal(response.status.toString(), "error with our servers", "error")
      }
    })
    // request.headers.set('Authorization', 'Bearer ' + Vue.auth.getToken())
    // next()
})

Router.beforeEach(

  (to, from, next) => { //to is where we want to go, from is current route, next is function that muct be called no matter what
    if( to.matched.some(record => record.meta.forVisitors) ){
      if( Vue.auth.isAuthenticated() ){
        next({
          path: '/feed'
        })
      } else { next() }
    }

    else if( to.matched.some(record => record.meta.forAuth) ){
      if( !Vue.auth.isAuthenticated() ){
        next({
          path: '/login'
        })
      } else { next() }
    }

    else { next() }
  }
)

new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
})
