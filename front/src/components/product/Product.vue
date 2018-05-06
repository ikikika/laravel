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
      </div>
    </div>
  </div>

</template>

<script>
  export default{
    props: ['product', 'authUser']
  }
</script>

<style>
.thumbnail{
  background: #EBF4FA;
}
</style>
