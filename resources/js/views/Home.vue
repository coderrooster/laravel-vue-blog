<template>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Hello, world!</h1>
      <p class="lead">This is home page for simple bog web app build with Laravel v7 and Vue.js v2.</p>
      <hr class="my-4" />
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
      <router-link class="btn btn-primary btn-lg" :to="{name: 'post.create'}">Let's Create New Post</router-link>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>