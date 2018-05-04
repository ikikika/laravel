import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'

import VueResource from 'vue-resource'

import Auth from './packages/auth/Auth.js'

Vue.use(VueResource) //install vue-resource first amd configure like this
Vue.use(Auth) //register auth package globally

new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
})
