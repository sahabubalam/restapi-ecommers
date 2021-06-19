<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Edit Color</h4>
        <router-link to="/color" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Color</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="UpdateColor">
            <div class="form-group">
               <div class="add_item"> 
                   <div class="form-row">
                        <div class="col-md-10">
                            <label>Color Name</label>
                            <input type="text" class="form-control my-colorpicker1" v-model="form.color_name">
                        </div>
                       
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4 ">
                        <button type="submit" class="btn btn-info btn-rounded mt-10">Update</button>
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
            UpdateColor(){
                let id=this.$route.params.id
                axios.patch('/api/color/'+id,this.form)
                .then(()=>{
                    this.$router.push({name : 'color'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        },
        created(){
            let id=this.$route.params.id
            axios.get('/api/color/'+id)
            .then(({data})=>(this.form=data))
            .catch(console.log('error'))
        }
    }
</script>
<style>
</style>