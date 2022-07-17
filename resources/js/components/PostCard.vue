<template>
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">{{ post.title }}</h3>
      <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
      <p>Categoria: {{ post.category ? post.category.name : "Nessuna" }}</p>
      <p class="card-text">
        {{ getCardText(post.content, 50) }}
      </p>
      <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
    </div>
    <router-link
      class="card-link"
      :to="{ name: 'single-post', params: { slug: post.slug } }"
      >Vedi il post</router-link
    >
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: {
    post: Object,
  },
  methods: {
    getCardText(text, charNbr) {
      if (text.length > charNbr) {
        return text.substr(0, charNbr) + "...";
      }

      return text;
    },
  }
};
</script>

<style lang="scss" scoped>
.card {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  .card-link {
    display: inline-block;
    padding: 1.25rem;
  }
}
</style>