
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
//district component
let district = require('./components/admin/district/create.vue').default;
let alldistrict = require('./components/admin/district/index.vue').default;
//upozela component
let upozela = require('./components/admin/upozela/create.vue').default;
let allupozela = require('./components/admin/upozela/index.vue').default;
//village component
let village = require('./components/admin/village/create.vue').default;
let allvillage = require('./components/admin/village/index.vue').default;

//frontend
let productbycat = require('./components/frontend/productbycategory/product.vue').default;
let productdetails = require('./components/frontend/productbycategory/product-details.vue').default;
//product
let frontallproduct = require('./components/frontend/product/allproduct.vue').default;
let wishlist = require('./components/frontend/wishlist/wishlist.vue').default;
//cart
let cart = require('./components/frontend/cart/cart.vue').default;
//checkout
let checkout = require('./components/frontend/checkout/checkout.vue').default;

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
    //district route
    { path: '/admin/dashboard/store-district', component: district, name:'store-district' },
    { path: '/admin/dashboard/district', component: alldistrict, name:'all-district' },
    //upozela route
    { path: '/admin/dashboard/store-upozela', component: upozela, name:'store-upozela' },
    { path: '/admin/dashboard/upozela', component: allupozela, name:'all-upozela' },
    //village route
    { path: '/admin/dashboard/store-village', component: upozela, name:'store-village' },
    { path: '/admin/dashboard/village', component: allvillage, name:'all-village' },

     // all frontend route
     { path: '/product-bycat', component: productbycat, name:'product-bycat' },
     { path: '/product-details/:id', component: productdetails, name:'product-details' },
     //all product frontend
     { path: '/all-product', component: frontallproduct, name:'all-product' },
     { path: '/wishlist', component: wishlist, name:'wishlist' },
     //cart
     { path: '/cart', component: cart, name:'cart' },
      //checkout
      { path: '/checkout', component: checkout, name:'checkout' },
     


  
  ]