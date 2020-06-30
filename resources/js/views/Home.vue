<template>
  <div class="container">

    <div class="row">

      <div v-for="(post, index) in posts" :key="index" class="col-sm-12 col-md-4">
        <div class="card mb-4">
          <img src="assets/images/beach.jpg" class="card-img-top" alt="image post" />
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.body }}</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
          <div class="card-footer">
            <strong>Category : {{ post.category }}</strong> | 
            <small class="text-muted text-right right-align">Published : {{ post.publishedForHuman }}</small>
          </div>
        </div>
      </div>

      <div v-if="posts.length < 1" class="col-md-12">
        <div class="alert alert-info" role="alert">
          Sorry data post is empty! Please <router-link class="alert-link" :to="{name: 'post.create'}">create new post</router-link>.
        </div>
      </div>

    </div>

  </div>
</template>

<script>
  export default {
    data() {
      return {
        posts: []
      };
    },

    mounted() {
      axios.get("api/posts/").then(res => {
        this.posts = res.data.data;
        if(res.data.data.length < 1){
          console.log('post is empty!')
        }
      });
    }
  };
</script>