<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Published</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(post, index) in posts" :key="index">
              <td>{{ index+1 }}</td>
              <td>{{ post.title }}</td>
              <td>{{ post.category }}</td>
              <td>{{ post.published }}</td>
            </tr>
          </tbody>
        </table>
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
