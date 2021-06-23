
require('./bootstrap');

//vue router
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
//routes import
import {routes} from './routes';
//sweet alert
import Swal from 'sweetalert2'
window.Swal=Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast=Toast;
//sweet alert end

window.Reload=new Vue();

//import notification
import Notification from './Helpers/Notification';
window.Notification = Notification
//end notofication

import StarRating from 'vue-star-rating'


const router = new VueRouter({
    routes,
    mode: 'history',
  })


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('product-review', require('./components/frontend/product/product-review.vue').default);
Vue.component('star-rating',StarRating).default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
