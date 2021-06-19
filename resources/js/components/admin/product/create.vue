<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Product</h4>
        <router-link to="/product" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Product</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertProduct" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Product Name</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.product_name">
                    </div>
                    <div class="col-md-4">
                        <label>Product Description</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.product_description">
                    </div>
                    <div class="col-md-4">
                        <label>Short Description</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.short_description">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Regular Price</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.regular_price">
                    </div>
                    <div class="col-md-4">
                        <label>Sale Price</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.sale_price">
                    </div>
                    <div class="col-md-4">
                        <label>Featured</label>
                        <select class="form-control my-colorpicker1" id="select" v-model="form.featured">
                            <option disabled="" selected="">select</option>
                            <option value="1">Yes</option>      
                            <option value="0">No</option> 
                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Quantity</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.quantity">
                    </div>
                    <div class="col-md-4">
                        <label>Category</label>
                
                        <select class="form-control my-colorpicker1" id="select" v-model="form.category_id">
                            <option disabled="" selected="">select</option>
                            <option v-for="category in categories" :value="category.id">{{category.category_name}}</option>      
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Discount</label>
                        <select class="form-control my-colorpicker1" id="select" v-model="form.discount">
                            <option disabled="" selected="">select</option>
                            <option value="">No</option> 
                            <option value="5%">5%</option>      
                            <option value="10%">10%</option> 
                            <option value="30%">30%</option>   
                        </select>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Color</label>
                
                        <select class="form-control my-colorpicker1" id="select" v-model="form.color_id">
                            <option disabled="" selected="">select</option>
                            <option v-for="color in colors" :value="color.id">{{color.color_name}}</option>      
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Size</label>
                        <select class="form-control my-colorpicker1" id="select" v-model="form.size_id">
                            <option disabled="" selected="">select</option>
                            <option v-for="size in sizes" :value="size.id">{{size.size}}</option>  
                        </select>
                    </div>
                    
                </div>
                <div class="row">
                   <div class="col-md-6">
                        <label>Image</label>
                        <input type="file" class="form-control my-colorpicker1" @change="onFileSelected">
                    </div>
                    <div class="col-md-6">
                        <img :src="form.photo" class="form-control " style="height:50px;width:50px;margin-top:27px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ">
                        <button type="submit" class="btn btn-info btn-rounded mt-10">Submit</button>
                    </div>
                    <div></div>
                    <div></div>
               </div>
            </div>
            </form>
        </div>

    </div>
    
</template>
<script>
    export default{
        data(){
            return{
                form:{
                    product_name:null,
                    product_description:null,
                    short_description:null,
                    regular_price:null,
                    sale_price:null,
                    featured:null,
                    quantity:null,
                    status:null,
                    category_id:null,
                    color_id:null,
                    size_id:null,
                    discount:null,
                    photo:null
                },
                categories:{},
                colors:{},
                sizes:{},
                errors:{}
            }
        },
        methods:{
                onFileSelected(event){
            let file=event.target.files[0];
            if(file.size > 1048770){
                Notification.image_validation()

            }else{
                let reader= new FileReader();
                reader.onload=event=>{
                    this.form.photo=event.target.result
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        InsertProduct(){
                axios.post('/api/product',this.form)
                .then(()=>{
                    this.$router.push({name : 'prooduct'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        },
        created(){
        //category
        axios.get('/api/category/')
        .then(({data})=>(this.categories=data))
        //color
        axios.get('/api/color/')
        .then(({data})=>(this.colors=data))
        //size
        axios.get('/api/size/')
        .then(({data})=>(this.sizes=data))
    
  }
    }
</script>
<style>
</style>