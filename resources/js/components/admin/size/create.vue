<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Size</h4>
        <router-link to="/size" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Size</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertSize">
            <div class="form-group">
               <div class="add_item"> 
                   <div class="form-row">
                        <div class="col-md-10">
                            <label>Size</label>
                            <input type="text" class="form-control my-colorpicker1" placeholder="Ex: L,M.." v-model="form.size">
                        </div>
                       
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4 ">
                        <button type="submit" class="btn btn-info btn-rounded mt-10">Submit</button>
                    </div>
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
                    size:'',
                },
                errors:{}
            }
        },
        methods:{
            InsertSize(){
                axios.post('/api/size',this.form)
                .then(()=>{
                    this.$router.push({name : 'size'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        }
    }
</script>
<style>
</style>