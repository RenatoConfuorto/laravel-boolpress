import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AppHome from './pages/AppHome'
import PostList from './pages/PostList'
import TagsList from './pages/TagsList'
import AppTagPage from './pages/AppTagPage'
import AppContact from './pages/AppContact'
import AppPostPage from './pages/AppPostPage'

import NotFound from './pages/NotFound'

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: AppHome,
    },
    {
      path: '/posts',
      name: 'posts',
      component: PostList,
    },
    {
      path: '/posts/:slug',
      name: 'single-post',
      component: AppPostPage,
    },
    {
      path: '/tags',
      name: 'tags',
      component: TagsList,
    },
    {
      path: '/tags/:slug',
      name: 'single-tag',
      component: AppTagPage
    },
    {
      path: '/contact',
      name: 'contact',
      component: AppContact,
    },
    {
      path: '/*',
      component: NotFound,
    },
  ],
});

export default router;