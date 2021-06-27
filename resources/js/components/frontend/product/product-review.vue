<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
            <form @submit.prevent="ProductReview">
                <div class="modal-body">
                    <div class="container">
                       
                        <h5 class="mt-2">Rate Our Product</h5>
                        <star-rating  v-model="form.rating" v-bind:increment="0.5"
                                    v-bind:max-rating="5"
                                    v-bind:star-size="30" >
                        </star-rating>
                            <!-- <star-rating :star-size="20"  v-model="form.rating"></star-rating> -->
                            <div class="form-group mt-1">
                                <input type="text" class="form-control" v-model="form.headline" placeholder="Headline">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.description" placeholder="Tell us More">
                            </div>
                            <input type="hidden" class="form-control" v-model="form.product_id">
                            <input type="hidden" name="user_id" class="form-control" v-model="form.user_id">
                    </div>
            
                
                </div>
                <div class="container my-2">
                    <button type="button" style="min-width:0px;font-size:10px" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" style="min-width:0px;font-size:10px" class="btn btn-sm btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
        </div>
   </div>
    
</template>
<script>

    export default{
        props:['app','product'],

      
        data(){
            return{
                form:{
                    rating:'',
                    // user_id:this.userid,
                    user_id:this.$userId,
                    product_id:this.product,
                    headline:'',
                    description:'',
                    approved:'',
                },
              
                lists:[],
                errors:[],
            }
        },
        methods:{
            ProductReview(){
               
            axios.post('/api/add/product/review',this.form)

            .then(()=>{
                    
                    if(this.errors){
                    }
                    else{
                        Notification.success()
                    }
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
     
        },
        created(){
            this.ProductReview();
        } 
    }
</script>
<style>
</style>