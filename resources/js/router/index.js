import Home from '../views/Home.vue'
import ProductForm from '../views/ProductForm.vue'

export default {
  mode: 'history',

  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/product',
      name: 'product',
      component: ProductForm,
    },
  ]
}