<!--
1. import component
2. define component
3. use component
-->

<template>
  <div id="app">
    <navbar></navbar>
    <login></login>
  </div>
</template>

<script>

import Navbar from './components/Navbar.vue'
import Login from './components/auth/Login.vue'

export default {
    components: {
      'navbar': Navbar,
      'login': Login
    }
}

</script>

<style>

</style>
