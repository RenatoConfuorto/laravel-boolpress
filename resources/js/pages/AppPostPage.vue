<template>
  <div class="container">
    <div class="post" v-if="post">
      <div class="post-header">
        <h1>{{ post.title }}</h1>
      </div>

      <div class="post-body">
        <p>{{ post.content }}</p>
        <p>Categoria: <span>{{ getCategory }}</span></p>
      </div>

      <div class="post-tags">
        <ul>
          <li v-for="tag in post.tags" :key="tag.id">

            <router-link to="#">#{{ tag.name }}</router-link>
          </li>
        </ul>
      </div>
    </div>
    <div v-else>
      <h1>Aggiungere Loader</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "AppPostPage",
  data() {
    return {
      slug: "",
      post: null,
      loading: true
    };
  },
  computed: {
    getCategory(){
      return this.post.category ? this.post.category.name : 'Nessuna';
    }
  },
  created() {
    this.slug = this.$route.params.slug;
    axios.get(`/api/posts/${this.slug}`).then((resp) => {
      // console.log(resp.data.response);
      this.post = resp.data.response;
      console.log(this.post);
    });
  },
};
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

.post {
  margin-top: 2rem;

  &-header{
    padding-bottom: 1rem;
    border-bottom: 2px solid $cyan;
  }

  &-body{
    margin-top: 2rem;
    line-height: 1.8;
  }

  &-tags{

    ul{
      list-style: none;

    }
  }
}
</style>