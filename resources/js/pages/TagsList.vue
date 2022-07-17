<template>
<div class="container">
  <h1>Tutti i Tag</h1>
  <div class="row row-cols-3">
    <div
      v-for="tag in tags"
      :key="tag.id"
      class="col mt-4 align-content-center"
      >
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">{{ tag.name }}</h3>
          <p class="card-text">
          <!-- {{ getCardText(post.content, 50) }} -->
          </p>
        </div>
        <router-link class="card-link" :to="{ name: 'single-tag', params: { slug: tag.slug } }">Vedi i post collegati</router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "TagsList",
  data() {
    return {
      tags: [],
    };
  },
  created() {
    this.getTags();
  },
  methods: {
    getTags() {
      axios.get("http://127.0.0.1:8000/api/tags").then((resp) => {
        // console.log(resp.data);
        this.tags = resp.data.response;
        console.log(this.tags);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.container {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding-top: 2rem;

  .row {
    .col {
      .card {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        &-body{
          text-transform: capitalize;
        }

        &-link {
          display: inline-block;
          padding: 1.25rem;
        }
      }
    }
  }
}
</style>