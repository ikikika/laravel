<template>
  <div>
    <!--Pulling Awesome Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <div class="form-login">
                <h4>Register</h4>
                <input type="text" class="form-control input-sm chat-input" placeholder="full name" v-model="name"/>
                <br>
                <input type="email" class="form-control input-sm chat-input" placeholder="email" v-model="email"/>
                </br>
                <input type="password" class="form-control input-sm chat-input" placeholder="password" v-model="password"/>
                </br>
                <div class="wrapper">
                <span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
                </span>
                </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default{
    data () {
      return {
        name: '',
        email: '',
        password: ''
      }
    }
  }
</script>

<style>
  @import url(http://fonts.googleapis.com/css?family=Roboto:400);
  body {
  background-color:#fff;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
  }

  .container {
    padding: 25px;

  }

  .form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
  }

  h4 {
  border:0 solid #fff;
  border-bottom-width:1px;
  padding-bottom:10px;
  text-align: center;
  }

  .form-control {
    border-radius: 10px;
  }

  .wrapper {
    text-align: center;
  }

</style>
