<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Category</h4>
        <router-link to="/color" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Color</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertColor">
            <div class="form-group">
               <div class="add_item"> 
                   <div class="form-row">
                        <div class="col-md-10">
                            <label>Color Name</label>
                            <input type="text" class="form-control my-colorpicker1" placeholder="Ex: red,blue.." v-model="form.color_name">
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
                    color_name:'',
                },
                errors:{}
            }
        },
        methods:{
            InsertColor(){
                axios.post('/api/color',this.form)
                .then(()=>{
                    this.$router.push({name : 'color'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        }
    }
</script>
<style>
</style>