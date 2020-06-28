<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header font-weight-bold">New Post</div>
          <div class="card-body">
            <form action="#" method="post" @submit.prevent="store">
              <div class="form-group">
                <label for="title" class="font-weight-normal">Title</label>
                <input type="text" id="title" class="form-control" v-model="form.title" />
                <div v-if="form_error.title" class="mt2 text-danger">{{ form_error.title[0] }}</div>
              </div>

              <div class="form-group">
                <label for="category" class="font-weight-normal">Category</label>
                <select id="category" class="form-control" v-model="form.category">
                  <option value selected disabled>Choose Category</option>
                  <option v-for="c in category" :key="c.id" :value="c.id">{{ c.name }}</option>
                </select>
                <div
                  v-if="form_error.category"
                  class="mt2 text-danger"
                >{{ form_error.category[0] }}</div>
              </div>

              <div class="form-group">
                <label for="body" class="font-weight-normal">Content</label>
                <textarea id="body" rows="10" class="form-control" v-model="form.body"></textarea>
                <div v-if="form_error.body" class="mt2 text-danger">{{ form_error.body[0] }}</div>
              </div>

              <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: "",
        category: "",
        body: ""
      },
      category: [],
      form_error: []
    };
  },

  mounted() {
    this.getCategory();
  },

  methods: {
    resetForm() {
      this.form.title = "";
      this.form.category = "";
      this.form.body = "";
      this.form_error = [];
    },
    responseForm(type, content) {
      this.$toasted.show(content, {
        type: type,
        theme: "bubble",
        position: "top-center",
        duration: 3000,
        action: {
          text: "Okey",
          onClick: (e, toastObject) => {
            toastObject.goAway(0);
          }
        }
      });
    },
    async getCategory() {
      let ctg = await axios.get("/api/categories");
      if (ctg.status == 200) {
        this.category = ctg.data;
      }
    },
    async store() {
      try {
        let save = await axios.post("/api/posts/store", this.form);
        //console.log(save)
        if (save.status == 200) {
          this.resetForm();
          this.responseForm("success",save.data.msg)
        }
      } catch (e) {
        if(e.response.status == 422){
          this.form_error = e.response.data.errors;
          this.responseForm("error","Oops, something went wrong!")
        }else{
          this.responseForm("error","Oops, Internal server error!")
        }
      }
    }
  }
};
</script>