<template>
    <div class="progress">
      <progressbar now="50" type="success" striped animated></progressbar>
    </div>
</template>

<script>
    import { progressbar } from 'vue-strap'

    export default {
        components: {
          progressbar
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
