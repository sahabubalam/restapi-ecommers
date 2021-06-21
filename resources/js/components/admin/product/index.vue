<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
                <router-link to="/store-product" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Product</router-link>
            </div>
            <br>
                <input type="text" v-model="searchTerm" placeholder="Search Here" class="form-control mr-2" style="width:300px">
                <br>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Regular Price</th>
                            <th>Sale Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in filtersearch" :key="product.id">
                            <td>{{product.product_name}}</td>
                            <td>{{product.regular_price}}</td>
                            <td>{{product.sale_price}}</td>
                            <td>{{product.quantity}}</td>
                            <td><img :src="'http://localhost:8000/'+product.photo" style="height:60px;width:60px"></td>
                            <td>
                            <router-link :to="{ name:'edit-product',params:{id:product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <router-link :to="{ name:'show-product',params:{id:product.id}}" class="btn btn-sm btn-primary">show</router-link>
                             <a @click="Active(product.id)" v-if="product.status==1" class="btn btn-sm btn-primary"><font color="#ffffff">Active</font></a>
                            
                            <a @click="Active(product.id)" v-if="product.status==0" class="btn btn-sm btn-danger"><font color="#ffffff">Inactive</font></a>
                            <a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                            </td>
                        </tr>
                     
                    </tbody>
                
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
                
                </div>
        </div>
    </section>

   </div>
    
</template>
<script>
    export default{
        data(){
            return{
                products:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.products.filter(product=>{
                    return product.product_name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allProduct(){
            axios.get('/api/product/')
            .then(({data})=>this.products=data)
            .catch()
        },
        Active(id)
        {
            axios.get('/api/product/status/'+id)
            .then(()=>{
                
                Reload.$emit('AfterAdd');
                    this.$router.push({name : 'prooduct'})
                    Notification.success()
            })
        .catch(error=>this.errors=error.response.data.errors)
        },
        deleteProduct(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete('/api/product/'+id)
          .then(()=>{
            this.products=this.products.filter(product=>{
              return product.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'prooduct'})

          })
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })

      }
        },
        created(){
        this.allProduct();
        this.Active();
        Reload.$on('AfterAdd',()=>{
            this.allProduct();
        })
  } 
    }
</script>
<style>
</style>