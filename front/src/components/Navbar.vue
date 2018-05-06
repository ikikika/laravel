<!--  vue components always consist of template, script and style-->
<template>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">

            <router-link tag="li" to="/login" v-if="!isAuth">
              <a>Login</a>
            </router-link>

            <router-link tag="li" to="/register" v-if="!isAuth">
              <a>Register</a>
            </router-link>

            <router-link tag="li" to="/feed" v-if="isAuth">
              <a>Feed</a>
            </router-link>

            <router-link tag="li" to="/logout" v-if="isAuth">
              <a>Logout</a>
            </router-link>

          <!-- <li><button class="btn btn-primary" @click="logout">Logout</button></li> -->
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</template>

<script>
export default{
  data(){
    return {
      isAuth: null
    }
  },
  created(){
    this.isAuth = this.$auth.isAuthenticated()
  },
  methods: {
    logout(){
      this.$auth.destroyToken()
      console.log('logged out');
      this.$router.push("/login")
    }
  }
}
</script>

<style>

</style>
