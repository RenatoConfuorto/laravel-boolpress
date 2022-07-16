<template>
  <div class="ms_container">

    <div class="select-container">
      <h4>Numero di elementi:</h4>
      <select class="form-select" aria-label="Default select example" v-model="itemsPerPage" @change="getPosts(1)">
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="9">9</option>
      </select>
    </div>

    <div class="container">
      <div class="row row-cols-3">
        <div
          v-for="post in posts"
          :key="post.id"
          class="col mt-4 align-content-center"
        >
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">{{ post.title }}</h3>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
              <p>Categoria: {{ post.category ? post.category.name : 'Nessuna' }}</p>
              <p class="card-text">
                {{ getCardText(post.content, 50) }}
              </p>
              <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
            </div>
              <router-link class="card-link" :to="{ name: 'single-post', params: { slug: post.slug } }">Vedi il post</router-link>
          </div>
        </div>
      </div>

      <ul class="pagination mb-5">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <a class="page-link" href="#" @click="getPosts(currentPage - 1)"
            >Previous</a
          >
        </li>

        <li
          class="page-item"
          v-for="n in totalPages"
          :key="n"
          :class="{ active: currentPage === n }"
        >
          <a class="page-link" href="#" @click="getPosts(n)">{{ n }}</a>
        </li>

        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
          <a class="page-link" href="#" @click="getPosts(currentPage + 1)"
            >Next</a
          >
        </li>
      </ul>
    </div>
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
      itemsPerPage: 6,
    };
  },
  methods: {
    getPosts(currentPage) {
      axios
        .get("http://127.0.0.1:8000/api/posts", {
          params: {
            page: currentPage,
            itemsPerPage: this.itemsPerPage,
          },
        })
        .then((resp) => {
          // console.log(resp);
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
@import "../../sass/_variables.scss";
.ms_container{
  height: calc(100vh - $header-height);
  display: flex;
  flex-direction: column;

  .select-container{
    margin-top: 1rem;
    margin-left: 1rem;
    display: flex;
  }

  .container {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  
    .row {
      // align-items: stretch;
  
      .col {
        .card {
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          
          .card-link{
            display: inline-block;
            padding: 1.25rem;
          }
        }
      }
    }
  }
}
</style>