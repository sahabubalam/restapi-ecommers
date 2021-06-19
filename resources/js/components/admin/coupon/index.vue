<template>
    <div>
    <section class="content">
        <div class="row">
            <div class="col-12">

            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Coupon List</h3>
                <router-link to="/store-coupon" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Coupon</router-link>
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
                            <th>Code</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="coupon in filtersearch" :key="coupon.id">
                            <td>{{coupon.code}}</td>
                            <td>{{coupon.value}}</td>
                            <td>{{coupon.type}}</td>
                            <td>
                            <router-link :to="{ name:'edit-coupon',params:{id:coupon.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteCoupon(coupon.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                            
                            <a @click="Active(coupon.id)" v-if="coupon.status==1" class="btn btn-sm btn-primary"><font color="#ffffff">Active</font></a>
                            
                            <a @click="Active(coupon.id)" v-if="coupon.status==0" class="btn btn-sm btn-danger"><font color="#ffffff">Inactive</font></a>
                           
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
                coupons:[],
                searchTerm:''
            }
        },
        computed:{
            filtersearch(){
                return this.coupons.filter(coupon=>{
                    return coupon.code.match(this.searchTerm)
                })
            }
        },
        methods:{
            allCoupon(){
            axios.get('/api/coupon/')
            
            .then(({data})=>this.coupons=data)
            .catch()
        },
        Active(id)
        {
            axios.get('/api/coupon/status/'+id)
            .then(()=>{
                
                Reload.$emit('AfterAdd');
                    this.$router.push({name : 'coupon'})
                    Notification.success()
            })
        .catch(error=>this.errors=error.response.data.errors)
        },
        deleteCoupon(id){
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
          axios.delete('/api/coupon/'+id)
          .then(()=>{
            this.coupons=this.coupons.filter(coupon=>{
              return coupon.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({ name: 'coupon'})

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
    this.allCoupon();
    this.Active();
      Reload.$on('AfterAdd',()=>{
          this.allCoupon();
      })
    
    } 
    }
</script>
<style>
</style>