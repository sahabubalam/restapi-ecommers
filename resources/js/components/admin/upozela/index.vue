<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">District List</h3>
                <router-link to="/admin/dashboard/store-upozela" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Upozela</router-link>
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
                            <th>Upozela Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="upozela in filtersearch" :key="upozela.id">
                            <td>{{upozela.upozela_name}}</td>
                            
                            <td>
                            <!-- <router-link :to="{ name:'edit-district',params:{id:district.id}}" class="btn btn-sm btn-primary">Edit</router-link> -->
                            <a @click="deleteUpozela(upozela.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                           
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
                upozelas:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.upozelas.filter(upozela=>{
                    return upozela.upozela_name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allUpozela(){
            axios.get('/api/getting/upozela')
            .then(({data})=>this.upozelas=data)
            .catch()
        },
      
        deleteUpozela(id){
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
          axios.delete('/api/delete/upozela/'+id)
          .then(()=>{
            this.upozelas=this.upozelas.filter(upozela=>{
              return upozela.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'upozela'})

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
        this.allUpozela();
        this.Active();
      Reload.$on('AfterAdd',()=>{
          this.allUpozela();
      })
  } 
    }
</script>
<style>
</style>