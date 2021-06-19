<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Size List</h3>
                <router-link to="/store-size" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Size</router-link>
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
                            <th>size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="size in filtersearch" :key="size.id">
                            <td>{{size.size}}</td>
                            
                            <td>
                            <router-link :to="{name:'edit-size',params:{id:size.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteSize(size.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
                sizes:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.sizes.filter(size=>{
                    return size.size.match(this.searchTerm)
                })
            }
        },
        methods:{
            allColor(){
            axios.get('/api/size/')
            .then(({data})=>this.sizes=data)
            .catch()
        },
        deleteSize(id){
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
          axios.delete('/api/size/'+id)
          .then(()=>{
            this.sizes=this.sizes.filter(size=>{
              return size.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'size'})

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
        this.allColor();
  } 
    }
</script>
<style>
</style>