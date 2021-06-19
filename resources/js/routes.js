let login =require('./components/auth/login.vue').default;
let register =require('./components/auth/register.vue').default;
let home =require('./components/admin/home.vue').default;
//product component
let product = require('./components/admin/product/create.vue').default;
let allproduct = require('./components/admin/product/index.vue').default;
let editproduct = require('./components/admin/product/edit.vue').default;
//category component
let category = require('./components/admin/category/create.vue').default;
let allcategory = require('./components/admin/category/index.vue').default;
let editcategory = require('./components/admin/category/edit.vue').default;
//color component
let color = require('./components/admin/color/create.vue').default;
let allcolor = require('./components/admin/color/index.vue').default;
let editcolor = require('./components/admin/color/edit.vue').default;
let single = require('./components/admin/product/test.vue').default;
//size component
let size = require('./components/admin/size/create.vue').default;
let allsize = require('./components/admin/size/index.vue').default;
let editsize = require('./components/admin/size/edit.vue').default;
//coupon component
let coupon = require('./components/admin/coupon/create.vue').default;
let allcoupon = require('./components/admin/coupon/index.vue').default;
let editcoupon = require('./components/admin/coupon/edit.vue').default;
export const routes = [
    { path: '/login', component: login, name:'login' },
    { path: '/register', component: register, name:'register' },
    { path: '/home', component: home, name:'adminhome' },
    //product route
    { path: '/store-product', component: product, name:'store-prooduct' },
    { path: '/product', component: allproduct, name:'prooduct' },
    { path: '/edit-product/:id', component: editproduct, name:'edit-product' },
    //category route
    { path: '/store-category', component: category, name:'store-category' },
    { path: '/category', component: allcategory, name:'category' },
    { path: '/edit-category/:id', component: editcategory, name:'edit-category' },
    //color route
    { path: '/store-color', component: color, name:'store-color' },
    { path: '/color', component: allcolor, name:'color' },
    { path: '/edit-color/:id', component: editcolor, name:'edit-color' },

    { path: '/show-product/:id', component: single, name:'show-product' },

    //size route
    { path: '/store-size', component: size, name:'store-size' },
    { path: '/size', component: allsize, name:'size' },
    { path: '/edit-size/:id', component: editsize, name:'edit-size' },
     //coupon route
     { path: '/store-coupon', component: coupon, name:'store-coupon' },
     { path: '/coupon', component: allcoupon, name:'coupon' },
     { path: '/edit-coupon/:id', component: editcoupon, name:'edit-coupon' },
  
  ]