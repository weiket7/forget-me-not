import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './pages/Dashboard'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/adopt', name: 'Adopts', component: AdoptList },
    { path: '/adopt/save', name: 'AddAdopt', component: Adopt },
    { path: '/adopt/save/:adopt_id', name: 'SaveAdopt', component: Adopt },
  
    // { path: '/page', name: 'PageList', component: PageList },
    // { path: '/page/home', name: 'SaveHome', component: PageHome },
    // { path: '/page/save/:page_id', name: 'SavePage', component: Page },
  ]
})