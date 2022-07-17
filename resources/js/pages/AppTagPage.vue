<template>
<div class="container">
    <div class="tag" v-if="tag">
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
    <div v-else>
      <h1>Aggiungere Loader</h1>
    </div>
  </div>
</template>

<script>
import PostCard from '../components/PostCard.vue';

export default {
name: 'AppTagPage',
data(){
  return {
    slug: this.$route.params.slug,
    tag: null,
  }
},
components: {
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
    this.tag = resp.data.response;
    console.log(this.tag);
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

}
</style>