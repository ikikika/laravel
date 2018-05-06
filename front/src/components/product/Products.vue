<template>
  <div class="row">
      <!-- attr product is product defined in props, property item is from v-for loop, include colon to indicate item is an object, not a string-->
      <my-product v-for="item in products" :product="item">
      </my-product>
  </div>
</template>

<script>
  import Product from './Product.vue'

  export default{
    data(){
      return{
        products: []
      }
    },

    components: {
      'my-product': Product
    },

    created(){ /*lifecycle hook. make http call and initialise item in products*/
      this.$http.get("api/products") //no slash at front of uri
        .then(response=>{
          this.products = response.body
        })
    }
  }

</script>
