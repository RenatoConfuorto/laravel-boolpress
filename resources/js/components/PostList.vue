<template>
  <div class="container">
    <div class="row row-cols-3">
      <div
        v-for="post in posts"
        :key="post.id"
        class="col mt-4 align-content-center"
      >
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

    <ul class="pagination mt-5">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "PostList",
  data() {
    return {
      posts: [],
      currentPage: 1,
      totalPages: 1,
    };
  },
  methods: {
    getPosts(currentPage) {
      axios
        .get("http://127.0.0.1:8000/api/posts", {
          params: {
            page: currentPage,
          },
        })
        .then((resp) => {
          console.log(resp);
          this.posts = resp.data.response.data;
          this.currentPage = currentPage;
          this.totalPages = resp.data.response.last_page;
        });
    },
    getCardText(text, charNbr) {
      if (text.length > charNbr) {
        return text.substr(0, charNbr) + "...";
      }

      return text;
    },
  },
  created() {
    this.getPosts(1);
  },
};
</script>

<style lang="scss" scoped>
.row {
  align-items: stretch;

  .col {
    min-height: 100%;

    .card {
      height: 100%;
    }
  }
}
</style>