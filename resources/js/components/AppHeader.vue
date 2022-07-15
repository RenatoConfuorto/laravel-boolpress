<template>
  <header>
    <div class="logo">Boolflix</div>
    <nav>
      <ul>
        <li v-for="(link, index) in links" :key="index">
          <router-link :to="{ name: link.routeName }">{{ link.name }}</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "AppHeader",
  data() {
    return {
      links: [
        {
          name: "home",
          routeName: "home",
        },
        {
          name: "posts",
          routeName: "posts",
        },
        {
          name: "contact",
          routeName: "contact",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

header {
  height: $header-height;
  width: 100%;
  background-color: $cyan;
  display: flex;
  justify-content: space-between;

  .logo {
    margin-left: 1rem;
    height: 100%;
    font-weight: bolder;
    text-transform: uppercase;
    line-height: $header-height;
    font-size: 1.8rem;
  }

  nav {
    // line-height: $header-height;
    height: 100%;
    margin-right: 1.5rem;

    ul {
      height: 100%;
      display: flex;
      align-items: center;
      list-style: none;

      li {
        padding: 0.4rem 0.6rem;
        margin: 0 0.4rem;
        color: black;
        text-transform: capitalize;
        font-size: 1.2rem;

        a {
          color: inherit;
          text-decoration: none;
        }

        &:hover {
          font-weight: bold;
        }
      }
    }
  }
}
</style>