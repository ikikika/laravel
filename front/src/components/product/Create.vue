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
                    @click="create"
                    v-show="product.name && product.price > 0 && product.description">
                    Create
            </button>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default{
    data(){
      return {
        product: {
          name: '',
          price: 0,
          description: ''
        }
      }
    },
    methods:{
      create(){
        this.$http.post("api/products", this.product)
          .then(response=>{
            this.$router.push('/feed')
          })
      }
    }
  }
</script>
