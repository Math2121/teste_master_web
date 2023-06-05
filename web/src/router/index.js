import { createRouter, createWebHistory } from 'vue-router'

import Pedido from '../views/Pedido.vue'

const routes = [

  {
    path: '/',
    name: 'Pedido',
    component: Pedido
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})



export default router