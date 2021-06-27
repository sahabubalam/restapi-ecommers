<template>
    <div>
	
    <main class="main">
        	<div class="page-header text-center" style="background-image: url('frontend/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
           

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-12">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Picture</th>
											<th>Product</th>
											<th>Color</th>
											<th>Size</th>
                                            <th>price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<tr v-for="cart in carts" :key="cart.id">
											<td class="product-col">
												<div class="product">
													<div class="product-media">
														<a href="#">
															<img :src="cart.photo" alt="Product image">
														</a>
                                                    </div>
												</div><!-- End .product -->
											</td>
                                            <td class="price-col">{{cart.pro_name}}</td>
                                            <td class="price-col">{{cart.color}}</td>
                                            <td class="price-col">{{cart.size}}</td>
											<td class="price-col">{{cart.pro_price}}</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" :value="cart.pro_quantity" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">{{cart.pro_quantity*cart.pro_price}}</td>
											<td>
                                                <a style="min-width:0px;font-size:10px;border-radius:4px" class="btn btn-sm btn-danger">Delete</a>

                                            </td>

                                            <td hidden>
                                           
                                            {{sum=sum+cart.pro_quantity*cart.pro_price}}
                                            </td>
										</tr>
                                       
										
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form action="#">
			            					<div class="input-group">
				        						<input type="text" class="form-control" required placeholder="coupon code">
				        						<div class="input-group-append">
													<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
												</div><!-- .End .input-group-append -->
			        						</div><!-- End .input-group -->
			            				</form>
			            			</div><!-- End .cart-discount -->
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<div class="col-lg-4" >
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>{{subtotal}}</td>
	                						</tr><!-- End .summary-subtotal -->
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;50</td>
	                						</tr>



	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>{{subtotal+50}}</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<router-link to="/checkout" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</router-link>
	                			</div><!-- End .summary -->

		            			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                           </div><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    </div>
</template>
<script>
    export default{
        props:['app'],
        data(){
            
            return{
               
                carts:[],
                total:[],
               
            }
        },
        computed:{
            qty(){
            let sum=0;
            for(let i=0; i<this.carts.length;i++){
            sum+=(parseFloat(this.carts[i].pro_quantity))

        }
           return sum;
        },
        subtotal(){
            let sum=0;
            for(let i=0; i<this.carts.length;i++){
                sum+=(parseFloat(this.carts[i].pro_quantity)* parseFloat(this.carts[i].pro_price));

            }
            return sum;
        },

        },
        methods:{
            GetCart(){
                axios.get('/api/getting/cart/'+this.$userId)
                .then(({data})=>this.carts=data)
                .catch()

            },
        },
        created(){
            this.GetCart();
            this.GetCartTotal();
        }
    }
</script>
<style scoped>
.container {
  max-width: 960px;
}

.lh-condensed { line-height: 1.25; }
</style>
