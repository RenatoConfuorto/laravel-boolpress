<template>
<div class="loader_container">
  <div class="loader">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>
</div>
</template>

<script>
export default {
  name: 'AppLoader'
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

.loader_container{
  width: 100%;
  height: calc(100vh - $header-height);
  display: flex;
  justify-content: center;
  align-items: center;

  .loader{
    // width: 100px;
    // height: 100px;
    display: flex;

    .dot{
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background-color: $cyan;
      margin: 0 .75rem;
      animation: loading 1.4s linear infinite;
    }

    .dot:nth-child(2){
      animation-delay: .2s;
    }

    .dot:nth-child(3){
      animation-delay: .4s;
    }

    .dot:nth-child(4){
      animation-delay: .6s;
    }

    .dot:nth-child(5){
      animation-delay: .8s;
    }

    .dot:nth-child(6){
      animation-delay: 1s;
    }

    @keyframes loading {
      50%{
        transform: scale(1.8);
      }

      100%{
        transform: scale(1);
      }
    }
  }
}
</style>