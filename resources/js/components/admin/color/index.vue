<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Color List</h3>
                <router-link to="/store-color" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add color</router-link>
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
                            <th>Color Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="color in filtersearch" :key="color.id">
                            <td>{{color.color_name}}</td>
                            
                            <td>
                            <router-link to="" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteColor(color.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
                colors:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.colors.filter(color=>{
                    return color.color_name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allColor(){
            axios.get('/api/color/')
            .then(({data})=>this.colors=data)
            .catch()
        },
        deleteColor(id){
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
          axios.delete('/api/color/'+id)
          .then(()=>{
            this.colors=this.colors.filter(color=>{
              return color.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'color'})

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