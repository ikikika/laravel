<template>
  <div class="col-sm-4">
    <div class="thumbnail">
      <img src="https://canadatwoway.com/wp-content/uploads/2017/11/No_Image_Available.jpg" alt="">
      <div class="caption">
        {{ product.user_id }}
        <h3>{{ product.name }}</h3>
        <p>{{ product.price }}</p>
        <hr>
        <p>
          <a href="#" class="btn btn-default">
            Wish list
          </a>
          <a href="#" class="btn btn-success">
            Buy
          </a>
        </p>
        <hr>
        <p >
          <a href="#" class="btn btn-danger"
            v-if="product.user_id == authUser.id" @click="deleteProduct">
            Delete
          </a>
        </p>
      </div>
    </div>
  </div>

</template>

<script>
  import swal from 'sweetalert'

  export default{
    props: ['product', 'authUser'],

    methods: {
      deleteProduct(){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            this.$http.delete('api/products/'+this.product.id)
              .then(response=>{
                console.log(response);
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

<style>
.thumbnail{
  background: #EBF4FA;
}
</style>
