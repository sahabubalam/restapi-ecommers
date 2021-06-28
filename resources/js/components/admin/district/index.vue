<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">District List</h3>
                <router-link to="/admin/dashboard/store-district" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add District</router-link>
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
                            <th>District Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="district in filtersearch" :key="district.id">
                            <td>{{district.district_name}}</td>
                            
                            <td>
                            <!-- <router-link :to="{ name:'edit-district',params:{id:district.id}}" class="btn btn-sm btn-primary">Edit</router-link> -->
                            <a @click="deleteDistrict(district.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                           
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
                districts:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.districts.filter(district=>{
                    return district.district_name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allDistrict(){
            axios.get('/api/getting/district')
            .then(({data})=>this.districts=data)
            .catch()
        },
      
        deleteDistrict(id){
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
          axios.delete('/api/delete/district/'+id)
          .then(()=>{
            this.districts=this.districts.filter(district=>{
              return district.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'district'})

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
        this.allDistrict();
        this.Active();
      Reload.$on('AfterAdd',()=>{
          this.allDistrict();
      })
  } 
    }
</script>
<style>
</style>