<template>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" v-model="product.name">
            </div>
            <div class="form-group">
              <label for="">Price</label>
              <input type="number" class="form-control" v-model="product.price">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" v-model="product.description"></textarea>
            </div>
            <button class="btn btn-success pull-right"
                    @click="update"
                    v-show="product.name && product.price > 0 && product.description">
                    Update
            </button>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  import seal from 'sweetalert'

  export default{
    created(){
      this.getProduct()
    },
    data(){
      return {
        product: {
        }
      }
    },
    methods:{
      getProduct(){
        this.$http.get('api/products/'+this.$route.params.product)
          .then(response=>{
            this.product = response.body
          })
          .catch(response=>{
            swal(response.status.toString(), response.body.error, "error")
          })
      },
      update(){
        this.$http.put("api/products/"+this.$route.params.product, this.product)
          .then(response=>{
            swal("Updated", "Product Updated", "success")
          })
      }
    }
  }
</script>
