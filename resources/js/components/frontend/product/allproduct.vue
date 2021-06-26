<template>
<div>
<main class="main">
        	<div class="page-header text-center" style="background-image: url('frontend/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">All Product <span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      
                        
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
</main>




   <div class="container-fluid" >
          <div class="heading heading-center mb-3">
         
          <h2 class="title">Top Selling Products</h2>
           
          </div>

          <div class="row mb-3">
           

            <!-- Pie Chart -->
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class=" mb-4">
               

                <!-- Category wisw product -->
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product</a>
                </li>

                <li class="nav-item" v-for="category in categories" :key="category.id">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subProduct(category.id)">{{category.category_name}}</a>
                </li>


                
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-body">
                    
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6" v-for="product in products" :key="product.id">
                    
                        <div class="card" style="margin-bottom:5">
                       
                        <a  @click.prevent="AddWishlist(product.id)" class="btn-product-icon btn-wishlist"  ></a>
                       
                       
                            <img class="card-img-top" style="height:130px;width:160px" :src="product.photo" alt="Card image cap">
                           
                            <div class="card-body">
                                <h6 class="card-title">{{product.product_name}}</h6>
                                <span class="badge badge-success"  v-if="product.quantity>=1" >Available {{product.quantity}} </span>
                                <span class="badge badge-danger"  v-else=" ">Stock Out {{product.quantity}} </span>
                                <div>
                                 <router-link :to="{ name:'product-details',params:{id:product.id}}"><span class="btn btn-sm btn-outline-secondary">add to cart</span></router-link>
                                </div>
                                
                            </div>
                        </div>
                      
                   
                    </div>
                    </div>
                  
                </div>
                </div>


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6" v-for="getproduct in getproducts" :key="getproduct.id">
                   
                        <div class="card" style="margin-bottom:5">
                       
                        <a @click.prevent="AddWishlist(getproduct.id)" class="btn-product-icon btn-wishlist" ></a>
                       
                        <img class="card-img-top" style="height:130px;width:160px" :src="getproduct.photo" alt="Card image cap">
                            
                            <div class="card-body">
                            <h6 class="card-title">{{getproduct.product_name}}</h6>
                                <span class="badge badge-success" v-if="getproduct.quantity>=1" >Available {{getproduct.quantity}}</span>
                                <span class="badge badge-danger" v-else=" " >Stock Out {{getproduct.quantity}}</span>
                             <div>
                                <router-link :to="{ name:'product-details',params:{id:getproduct.id}}"><span class="btn btn-sm btn-outline-secondary">add to cart</span></router-link>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                 

                    </div>
                </div>
              
                </div>
                 <!-- Category wisw product end -->

             
                
              </div>
            </div>
          </div>
          <!--Row-->

        
        </div>
  
   </div>
</template>
<script>
    export default{
        props:['app'],
        data(){
            return{
                form:{
                    user_id:this.$userId,
                },
                categories:[],
                getproducts:[],
                products:[],
                searchTerm:'',
               
               
            }
        },
        computed:{
            //check login or not
            user(){
            return this.$userId;
        }
            
        },
        methods:{
            allCategory(){
            axios.get('/api/category/')
            .then(({data})=>this.categories=data)
            .catch()
        },
        allProduct(){
            axios.get('/api/product/')
            .then(({data})=>this.products=data)
            .catch()
        },
     
        subProduct(id){
          axios.get('/api/getting/product/'+id)
          .then(({data})=>(this.getproducts=data))
          .catch()
         },
         AddWishlist(id)
         {
             if(this.user > 0){
                axios.post('/api/add/wishlist/'+id,this.form)
            .then(()=>{
                
                Notification.success()
            })
            .catch(error=>this.errors=error.response.data.errors)
             }
             else{
                Notification.login();
             }
             
            
           
         }
  
        },
        created(){
        this.allCategory();
        this.allProduct();
       
        } 
    }
</script>