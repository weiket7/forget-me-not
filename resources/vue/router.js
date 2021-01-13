import Vue from 'vue'
import Router from 'vue-router'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'
import Page from './pages/Page'
import Blog from './pages/Blog'
import BlogList from './pages/BlogList'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/', name: 'Dashboard', component: AdoptList },
    { path: '/adopt', name: 'AdoptList', component: AdoptList },
    { path: '/adopt/save', name: 'AddAdopt', component: Adopt },
    { path: '/adopt/save/:adoptId', name: 'SaveAdopt', component: Adopt },
  
    { path: '/blog', name: 'BlogList', component: BlogList },
    { path: '/blog/save/', name: 'Blog', component: Blog },
    { path: '/blog/save/:blogId', name: 'Blog', component: Blog },
    { path: '/page/:page', name: 'Page', component: Page },
  ]
})