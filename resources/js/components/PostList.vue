<template>
  <div class="container">
    <div class="row row-cols-3">
      <div v-for="post in posts" :key="post.id" class="col mt-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">
              {{ getCardText(post.content, 50) }}
            </p>
            <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostList",
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios.get("http://127.0.0.1:8000/api/posts").then((resp) => {
        // console.log(resp.data);
        this.posts = resp.data.response;
      });
    },
    getCardText(text, charNbr){
      if(text.length > charNbr){
        return text.substr(0, charNbr) + '...';
      }

      return text;
    }
  },
  created() {
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped>
</style>