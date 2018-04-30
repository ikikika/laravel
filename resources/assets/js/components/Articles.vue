<template>
  <div>
    <h2>Articles</h2>

    <form class="mb-3" @submit.prevent="addArticle">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" v-model="article.title">
        <textarea type="text" class="form-control" placeholder="Body" v-model="article.body"></textarea>
        <button type="submit" class="btn btn-light btn-block">Save</button>
      </div>
    </form>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
         <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">  <!--disable if no previous page url -->
           <a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)"> <!--use @click to pass in previous page url -->
             Previous
           </a>
         </li>

        <li class="page-item disabled">
          <a class="page-link text-dark" href="#">
            Page {{ pagination.current_page }} of {{ pagination.last_page }}
          </a>
        </li>

        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">
            Next
          </a>
        </li>
      </ul>
    </nav>
    <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
      <h3>{{ article.title }}</h3>
      <p>{{ article.body }}</p>
      <hr>
      <button class="btn btn-warning mb-2" @click="editArticle(article)">
        Edit
      </button>
      <button class="btn btn-danger" @click="deleteArticle(article.id)">
        Delete
      </button>
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
      fetchArticles( page_url ){  //this is where we make our requests
        let vm = this;
        page_url = page_url || 'api/articles';

        //use vue fetch api
        fetch(page_url)
          .then( res => res.json() )
          .then( res => {
            this.articles = res.data;
            vm.makePagination(res.meta, res.links);
          })
          .catch(err => console.log(err));
      },
      makePagination(meta, links){
        let pagination = {
          current_page: meta.current_page,
          last_page: meta.last_page,
          next_page_url: links.next,
          prev_page_url: links.prev,
        }

        this.pagination = pagination;
      },
      deleteArticle(id){
        if( confirm('Are you sure?') ){
          fetch(`api/article/${id}`, {
            method: 'delete'
          })
          .then( res => res.json())
          .then( data => {
            alert('Article removed');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
        }
      },
      addArticle(){
        if( this.edit == false ){
          //add
          fetch('api/article', {
            method: 'post',
            body: JSON.stringify(this.article),
            headers: {
              'content-type': 'application/json'
            }
          })
          .then( res => res.json() )
          .then( data => {
            this.article.title = '';
            this.article.body = '';
            alert('Article added');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
        } else {
          // update
        }
      },
      editArticle(article){
        this.edit = true;
        //right side is article being passed in
        this.article.id = article.id;
        this.article.article_id = article.id;
        this.article.title = article.title;
        this.article.body = article.body;
      }
    }
  }
</script>
