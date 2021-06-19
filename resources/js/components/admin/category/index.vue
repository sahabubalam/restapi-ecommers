<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Category List</h3>
                <router-link to="/store-category" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Category</router-link>
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
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="category in filtersearch" :key="category.id">
                            <td>{{category.category_name}}</td>
                            
                            <td>
                            <router-link :to="{ name:'edit-category',params:{id:category.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                           
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
                categories:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.categories.filter(category=>{
                    return category.category_name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allCategory(){
            axios.get('/api/category/')
            .then(({data})=>this.categories=data)
            .catch()
        },
      
        deleteCategory(id){
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
          axios.delete('/api/category/'+id)
          .then(()=>{
            this.categories=this.categories.filter(category=>{
              return category.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'category'})

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
        this.allCategory();
        this.Active();
      Reload.$on('AfterAdd',()=>{
          this.allCategory();
      })
  } 
    }
</script>
<style>
</style>