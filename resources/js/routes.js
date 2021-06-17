let login =require('./components/auth/login.vue').default;
let register =require('./components/auth/register.vue').default;
let home =require('./components/admin/home.vue').default;
//product component
let product = require('./components/admin/product/create.vue').default;
let allproduct = require('./components/admin/product/index.vue').default;
//category component
let category = require('./components/admin/category/create.vue').default;
let allcategory = require('./components/admin/category/index.vue').default;
//color component
let color = require('./components/admin/color/create.vue').default;
let allcolor = require('./components/admin/color/index.vue').default;
let single = require('./components/admin/product/test.vue').default;
//size component
let size = require('./components/admin/size/create.vue').default;
let allsize = require('./components/admin/size/index.vue').default;

export const routes = [
    { path: '/login', component: login, name:'login' },
    { path: '/register', component: register, name:'register' },
    { path: '/home', component: home, name:'adminhome' },
    //product route
    { path: '/store-product', component: product, name:'store-prooduct' },
    { path: '/product', component: allproduct, name:'prooduct' },
    //category route
    { path: '/store-category', component: category, name:'store-category' },
    { path: '/category', component: allcategory, name:'category' },
    //color route
    { path: '/store-color', component: color, name:'store-color' },
    { path: '/color', component: allcolor, name:'color' },

    { path: '/show-product/:id', component: single, name:'show-product' },

    //size route
    { path: '/store-size', component: size, name:'store-size' },
    { path: '/size', component: allsize, name:'size' },
   
  
  ]