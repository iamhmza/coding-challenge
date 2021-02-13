import Home from '../views/Home.vue'

export default {
  mode: 'history',

  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
  ]
}