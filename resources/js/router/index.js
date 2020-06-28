import Home from '../views/Home'
import About from '../views/About'
import Contact from '../views/Contact'

import PostCreate from '../views/Posts/Create.vue'
import PostIndex from '../views/Posts/Index.vue'

export default{
  mode : 'history',
  linkActiveClass: 'active',
  routes: [
     {
       path : '/',
       name : 'home',
       component : Home
     },
     {
       path : '/about',
       name : 'pages.about',
       component : About
     },
     {
       path : '/contact',
       name : 'pages.contact',
       component : Contact
     },
     {
       path : '/posts/',
       name : 'post.index',
       component : PostIndex
     },
     {
       path : '/posts/create',
       name : 'post.create',
       component : PostCreate
     },
  ]
}