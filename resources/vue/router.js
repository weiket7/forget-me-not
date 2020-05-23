import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './pages/Dashboard'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'
import Page from './pages/Page'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/adopt', name: 'Adopts', component: AdoptList },
    { path: '/adopt/save', name: 'AddAdopt', component: Adopt },
    { path: '/adopt/save/:adoptId', name: 'SaveAdopt', component: Adopt },
  
    { path: '/page/donate', name: 'Page', component: Page },
  ]
})