<template>
    <div>
    <main class="main">
        	<div class="page-header text-center" style="background-image: url('frontend/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Wishlist<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><router-link to="/all-product" >All Product</router-link></li>
                        
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Picture</th>
                                <th>Product</th>
								<th>Price</th>
                                <th>Shipping</th>
								<th>Stock Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<tr v-for="wishlist in wishlists" :key="wishlist.id">
								<td class="product-col">
									<div class="product">
										
											<a href="#">
												<img :src="wishlist.photo" style="height:80px;width:80px" alt="Product image">
											</a>
										
									</div><!-- End .product -->
								</td>
                                <td class="price-col">{{wishlist.product_name}}</td>
								<td class="price-col">{{wishlist.price}}</td>
                                <td class="price-col">50</td>
								<td class="stock-col" v-if="wishlist.quantity>=1"><span class="in-stock">Available</span></td>
                                <td class="stock-col" v-else=" "><span class="in-stock">Stock out</span></td>
                                <td class="price-col">
                                    <router-link to="" style="min-width:0px;font-size:10px" class="btn btn-sm btn-primary">View</router-link>
                                    <a style="min-width:0px;font-size:10px" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                                </td>
								
							</tr>
							
						</tbody>
					</table><!-- End .table table-wishlist -->
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

    </div>

</template>
<script>
    export default{
        props:['app'],
        data(){
            return{
                wishlists:[],
                searchTerm:'',
                user_id:this.$userId,
               
            }
        },
        computed:{
           
            
        },
        methods:{
           AllWishlist(){
               axios.get('/api/getting/wishlist/'+this.user_id)
               .then(({data})=>this.wishlists=data)
            .catch()
           }
     
        },
        created(){
        this.AllWishlist();
        this.allProduct();
  } 
    }
</script>