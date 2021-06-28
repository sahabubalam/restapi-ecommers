<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Category</h4>
        <router-link to="/admin/dashboard/district" style="float:right;" class="btn btn-rounded btn-success mb-5"> All District</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertDistrict">
            <div class="form-group">
               
                    <div class="col-md-12">
                        <label>District Name</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.district_name">
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
                    district_name:null,
                },
                errors:{}
            }
        },
        methods:{
            InsertDistrict(){
                axios.post('/api/store/district',this.form)
                .then(()=>{
                   // this.$router.push({name : 'district'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        }
    }
</script>
<style>
</style>