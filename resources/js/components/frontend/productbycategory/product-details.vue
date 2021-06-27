<template>
<div>
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                       
                        <li class="breadcrumb-item"><router-link to="/product-bycat">Home</router-link></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Default</a></li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" style="height:300px;width:350px" :src="'http://localhost:8000/'+product.photo" data-zoom-image="frontend/assets/images/products/single/1-big.jpg" alt="product image">
                                            
                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                       
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                           
                                <div class="col-md-6">
                                <form @submit.prevent="AddtoCart(product.id)">
                                    <div class="product-details">
                                        <h1 class="product-title">{{product.product_name}}</h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            ${{product.sale_price}}
                                        </div><!-- End .product-price -->

                                        <div class="product-content">
                                            <p>{{product.product_description}} </p>
                                        </div><!-- End .product-content -->

                                        <div class="details-filter-row details-row-size">
                                            <label for="color">Color:</label>
                                            <div class="select-custom">
                                            <select class="form-control my-colorpicker1" id="select" v-model="form.color">
                                                <option disabled="" selected="">select</option>
                                                <option v-for="color in lists" :value="color">{{color}}</option>  
                                            </select>
                                            </div><!-- End .select-custom -->

                                            <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                        </div><!-- End .details-filter-row -->

                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Size:</label>
                                            <div class="select-custom">
                                            <select class="form-control my-colorpicker1" id="select" v-model="form.size">
                                                <option disabled="" selected="" >select</option>
                                                <option v-for="size in sizes" :value="size">{{size}}</option>      
                                            </select>
                                            </div><!-- End .select-custom -->

                                            <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                        </div><!-- End .details-filter-row -->

                                        <div class="details-filter-row details-row-size">
                                            <label for="qty">Qty:</label>
                                            <div class="product-details-quantity">
                                                <input type="number" id="qty" class="form-control"  value="1" v-model="form.pro_quantity" min="1" max="10" step="1" data-decimals="0">
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->

                                        <div class="product-details-action">
                                            <button type="submit"  class="btn-product btn-cart"><span>add to cart</span></button>

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                               
                                               


                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="product-details-footer">
                                            <div class="product-cat">
                                                <span>Category:</span>
                                                <a href="#">{{product.category_name}}</a>,
                                            
                                            </div><!-- End .product-cat -->

                                        
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                    </form>
                                </div><!-- End .col-md-6 -->
                           
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                   
                    

                   

                    <div class="product-details-tab">
                        <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Review
                        </button>
                        <!-- pass product id -->
                        <child  :product="product_id" />
                        </li>
                            <li class="nav-item">
                                <a class="nav-link " id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                           
                            
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                                    <ul>
                                        <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                        <li>Vivamus finibus vel mauris ut vehicula.</li>
                                        <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                    </ul>

                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                           
                           
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews (2)</h3>
                                    <div class="review"  v-for="review in reviews" :key="review.id">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{review.name}}</a></h4>
                                                <div class="ratings-container">
                                                    <div >
                                                  <star-rating v-bind:increment="0.5" v-bind:max-rating="5"
                                                    v-bind:star-size="15"  v-bind:rating="review.rating">
                                                </star-rating>
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">{{review.created_at}}</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>{{review.headline}}</h4>

                                                <div class="review-content">
                                                    <p>{{review.description}}</p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->

                                   
                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                  
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <!-- Button trigger modal -->



</div>
</template>
<script>
import Child from '../product/product-review';

    export default{
        props:['app'],
        data(){
           
            return{
                form:{
                color:'',
                size:'',
                pro_quantity:'',
                user_id:this.$userId,
                },
                product:[],
                lists:[],
                sizes:[],
                product_id:this.$route.params.id, 
                reviews:[],
               
                
            }

        },
        computed:{
             //check login or not
             user(){
            return this.$userId;
        }

        },
   
        components:{
                Child
        },
        methods:{
            productdetails(){
            let id=this.$route.params.id   
            axios.get('/api/product/details/'+id)
            .then(response=>{
                this.product=response.data;
                console.log(response.data);
            })
            .catch()
        },
        productreview(){
            let id=this.$route.params.id   
            axios.get('/api/product/review/'+id)
            .then(response=>{
                this.reviews=response.data;
                // console.log(response.data);
            })
            .catch()
        },
   
        allColor(){
            let id=this.$route.params.id
            axios.get('/api/product/color/'+id)
            .then(({data})=>this.lists=data)
            .catch()
        },
        allSize(){
            let id=this.$route.params.id
            axios.get('/api/product/size/'+id)
            .then(({data})=>this.sizes=data)
            .catch()
        },
        AddtoCart(id){
            if(this.user > 0){
                axios.post('/api/addtocart/'+id,this.form)
                .then(()=>{
                    //Reload.$emit('AfterAdd');
                    this.$router.push({ name: 'all-product'})
                    Notification.cart_success()
                })
                .catch()
            }
            else{
                Notification.login();
            }
                
        
      },
      
  
        },
        created(){
        this.productdetails();
        this.allColor();
        this.allSize();
        this.productreview()
        // this.interval= setInterval(function(){
        //     this.productreview()
        // }.bind(this),500);
       
  },
 
    }
</script>
<style>
</style>