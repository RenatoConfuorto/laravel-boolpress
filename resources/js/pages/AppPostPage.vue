<template>
  <div class="container">
    <div class="post" v-if="post">
      <div v-if="success">
        <div class="post-header">
          <h1>{{ post.title }}</h1>
        </div>

        <div class="post-body">
          <p>
            Categoria: <span>{{ getCategory }}</span>
          </p>
          <p class="text">{{ post.content }}</p>
          <div v-if="post.image_path">
            <img :src="post.image_path" alt=" ">
          </div>
        </div>

        <div class="post-tags">
          <ul>
            <li v-for="tag in post.tags" :key="tag.id">
              <router-link :to="{ name: 'single-tag', params: { slug: tag.slug } }">#{{ tag.name }}</router-link>
            </li>
          </ul>
        </div>
      </div>
      <div class="error" v-else>
        <h2>Il post richiesto non è stato trovato</h2>
        <router-link class="card-link" :to="{ name: 'posts' }">Torna indietro o riprova</router-link>
      </div>
    </div>
    <div v-else>
      <AppLoader />
    </div>
  </div>
</template>

<script>
import AppLoader from "../components/AppLoader.vue";

export default {
  name: "AppPostPage",
  data() {
    return {
      slug: "",
      post: null,
      success: false,
    };
  },
  components: {
    AppLoader,
  },
  computed: {
    getCategory() {
      return this.post.category ? this.post.category.name : "Nessuna";
    },
  },
  created() {
    this.slug = this.$route.params.slug;
    axios.get(`/api/posts/${this.slug}`).then((resp) => {
      // console.log(resp.data.response);
      this.post = resp.data.response ?? [];
      this.success = resp.data.response ? true : false;
      // console.log(this.post);
    });
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

.post {
  margin-top: 2rem;

  &-header {
    padding-bottom: 1rem;
    border-bottom: 2px solid $cyan;
  }

  &-body {
    margin-top: 2rem;
    line-height: 1.8;

    .text{
      font-size: 1.4rem;
    }
  }

  &-tags {
    ul {
      list-style: none;
    }
  }

  .error{
    width: 100%;
    height: calc(100vh - $header-height);
    color: $cyan;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    h2{
      margin-bottom: 1.5rem;
    }
  }
}
</style>