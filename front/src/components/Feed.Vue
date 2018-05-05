<template>
  <div>
    <h1>Feed</h1>
  </div>

</template>

<script>
  export default{
    data(){
      return{
        products: []
      }
    },
    created(){ //lifecycle hook. make http call and initialise pdt in products: []
      this.$http.get("api/products") //no slash at front of uri
    }
  }

</script>
