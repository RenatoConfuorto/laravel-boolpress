<template>
<div class="container">
    <div class="tag" v-if="tag">
      <div v-if="success">
        <div class="tag-header">
          <h1>{{ tag.name }}</h1>
        </div>
        <div class="tag-posts">
          <div class="row row-cols-3">
            <div class="col"  v-for="post in tag.posts" :key="post.id">
              <PostCard :post="post"/>
            </div>
          </div>
        </div>

      </div>
      <div class="error" v-else>
        <h2>Il tag richiesto non è stato trovato</h2>
        <router-link class="card-link" :to="{ name: 'tags' }">Torna indietro o riprova</router-link>
      </div>
    </div>
      <AppLoader v-else/>
  </div>
</template>

<script>
import AppLoader from '../components/AppLoader.vue';
import PostCard from '../components/PostCard.vue';

export default {
name: 'AppTagPage',
data(){
  return {
    slug: this.$route.params.slug,
    tag: null,
    success: false,
  }
},
components: {
  AppLoader,
  PostCard,
},
methods: {

},
created(){
  // console.log(this.$route);
  axios
  .get(`/api/tags/${this.slug}`)
  .then(resp => {
    // console.log(resp.data);
    // this.tag = resp.data.response;
    this.tag = resp.data.response ?? [];
    this.success = resp.data.response ? true : false;
    // console.log(this.tag);
  })
}
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

.tag {
  margin-top: 2rem;

  &-header{
    padding-bottom: 1rem;
    border-bottom: 2px solid $cyan;

    h1::first-letter{
      text-transform: capitalize;
    }
  }

  &-posts{
    margin-top: 2rem;
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