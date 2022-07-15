<template>
  <div class="main-title">
    <h1>Pagina non trovata</h1>

    <router-link :to="{ name: 'home' }">Torna alla pagina home</router-link>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.main-title{
  margin: 4rem;
  text-align: center;
}
</style>