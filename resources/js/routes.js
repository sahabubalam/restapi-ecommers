
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

//frontend
let productbycat = require('./components/frontend/productbycategory/product.vue').default;
let productdetails = require('./components/frontend/productbycategory/product-details.vue').default;
//product


export const routes = [
    
    { path: '/admin/dashboard/admin-home', component: home, name:'adminhome' },
    //product route
    { path: '/admin/dashboard/store-product', component: product, name:'store-prooduct' },
    { path: '/admin/dashboard/product', component: allproduct, name:'prooduct' },
    { path: '/admin/dashboard/edit-product/:id', component: editproduct, name:'edit-product' },
    //category route
    { path: '/admin/dashboard/store-category', component: category, name:'store-category' },
    { path: '/admin/dashboard/category', component: allcategory, name:'category' },
    { path: '/admin/dashboard/edit-category/:id', component: editcategory, name:'edit-category' },
    //color route
    { path: '/admin/dashboard/store-color', component: color, name:'store-color' },
    { path: '/admin/dashboard/color', component: allcolor, name:'color' },
    { path: '/admin/dashboard/edit-color/:id', component: editcolor, name:'edit-color' },

    { path: '/admin/dashboard/show-product/:id', component: single, name:'show-product' },

    //size route
    { path: '/admin/dashboard/store-size', component: size, name:'store-size' },
    { path: '/admin/dashboard/size', component: allsize, name:'size' },
    { path: '/admin/dashboard/edit-size/:id', component: editsize, name:'edit-size' },
     //coupon route
     { path: '/admin/dashboard/store-coupon', component: coupon, name:'store-coupon' },
     { path: '/admin/dashboard/coupon', component: allcoupon, name:'coupon' },
     { path: '/admin/dashboard/edit-coupon/:id', component: editcoupon, name:'edit-coupon' },

     //frontend route
     { path: '/product-bycat', component: productbycat, name:'product-bycat' },
     { path: '/product-details/:id', component: productdetails, name:'product-details' },
     //review
     


  
  ]