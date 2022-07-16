<template>
  <div>Singolo post</div>
</template>

<script>
export default {
  name: 'AppPostPage',
  data(){
    return{
      slug: '',
    }
  },
  created(){
    this.slug = this.$route.params.slug;
  }
}
</script>

<style lang="scss" scoped>

</style>