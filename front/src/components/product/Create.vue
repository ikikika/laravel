<template>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Price</label>
              <input type="number" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <Textarea class="form-control"></textarea>
            </div>
            <button class="btn btn-success pull-right">Create</button>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default{
    data(){
      return {

      }
    }
  }
</script>
