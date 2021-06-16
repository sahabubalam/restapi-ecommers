<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Category</h4>
        <router-link to="/category" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Category</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertCategory">
            <div class="form-group">
               <div class="add_item"> 
                   <div class="form-row">
                        <div class="col-md-10">
                            <label>Color Name</label>
                            <input type="text" class="form-control my-colorpicker1" v-model="form.color_name">
                        </div>
                        <div class="col-md-2" style="padding-top: 25px">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
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




        <div style="visibility:hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">

              
            <div class="col-md-10">
                <label>Color Name</label>
                <input type="text" class="form-control my-colorpicker1" v-model="form.color_name[4]">
            </div>
        
               
                <div class="col-md-2" style="padding-top: 25px">

                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>

            </div>

        </div>

    </div>

</div>

    </div>
    
</template>
 
<script>
    export default{
        data(){
            return{
                form:{
                    color_name:[],
                },
                errors:{}
            }
        },
        methods:{
            InsertCategory(){
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