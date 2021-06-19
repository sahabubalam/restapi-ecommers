<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Update Coupon</h4>
        <router-link to="/coupon" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Coupon</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="UpdateCoupon">
            <div class="form-group">
               
                    <div class="col-md-12">
                        <label>Code</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.code">
                    </div>
                    <div class="col-md-12">
                        <label>Value</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.value">
                    </div>
                    <div class="col-md-12">
                        <label>Type</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.type">
                    </div>
               
                    <div class="col-4 ">
                        <button type="submit" class="btn btn-info btn-rounded mt-10">Update</button>
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
                    code:null,
                    value:null,
                    type:null,
                    status:null,
                },
               
                errors:{}
            }
        },
        methods:{
            UpdateCoupon(){
                let id=this.$route.params.id
                axios.patch('/api/coupon/'+id,this.form)
                .then(()=>{
                    this.$router.push({name : 'coupon'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        },
        created(){
            let id=this.$route.params.id
            axios.get('/api/coupon/'+id)
            .then(({data})=>(this.form=data))
            .catch(console.log('error'))
        }
    }
</script>
<style>
</style>