<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Coupon</h4>
        <router-link to="/coupon" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Coupon</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertCoupon">
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
                        <button type="submit" class="btn btn-info btn-rounded mt-10">Submit</button>
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
                },
                errors:{}
            }
        },
        methods:{
            InsertCoupon(){
                axios.post('/api/coupon',this.form)
                .then(()=>{
                    this.$router.push({name : 'coupon'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        }
    }
</script>
<style>
</style>