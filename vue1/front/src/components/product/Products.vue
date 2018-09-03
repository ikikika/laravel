<template>
  <div class="row">
      <!-- attr product is product defined in props, property item is from v-for loop, include colon to indicate item is an object, not a string-->
      <!-- listen for @delete-product event and call deleteProductmethod -->
      <my-product
        v-for="item in products"
        @delete-product="deleteProduct(item)"
        :authUser="authUser"
        :product="item">
      </my-product>
  </div>
</template>

<script>
  import Product from './Product.vue'
  import swal from 'sweetalert'

  export default{
    data(){
      return{
        products: []
      }
    },

    computed: {
      authUser(){
        return this.$auth.getAuthUser()
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
    },

    methods: {
      deleteProduct(product){
        //console.log(product);
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            this.$http.delete('api/products/'+product.id)
              .then(response=>{
                //console.log(response);
                let index = this.products.indexOf(product)
                this.products.splice(index, 1)

                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
              })
          } else {
            swal("Your imaginary file is safe!");
          }

        });


      }
    }
  }

</script>
