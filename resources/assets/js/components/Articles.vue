<template>
  <div>
    <h2>Articles</h2>
    <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
      <h3>{{ article.title }}</h3>
      <p>{{ article.body }}</p>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {            //return statej
        articles: [],
        article: {
          id: '',
          title: '',
          body: ''
        },
        article_id: '',   //when we do our update put request, we have to send this field with it. bcos update and store same route
        pagination: {},
        edit: false       //bcos using same form to add and edit
      }
    },
    created() {           //run automatically when page loads
      this.fetchArticles();
    },
    methods: {
      fetchArticles(){  //this is where we make our requests
        //use vue fetch api
        fetch('api/articles')
          .then( res => res.json() )
          .then( res => {
            this.articles = res.data;
          })
      }
    }
  }
</script>
