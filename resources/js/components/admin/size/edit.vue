<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Update Size</h4>
        <router-link to="/size" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Size</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="UpdateSize">
            <div class="form-group">
               <div class="add_item"> 
                   <div class="form-row">
                        <div class="col-md-10">
                            <label>Size</label>
                            <input type="text" class="form-control my-colorpicker1" v-model="form.size">
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
            UpdateSize(){
                let id=this.$route.params.id
                axios.patch('/api/size/'+id,this.form)
                .then(()=>{
                    this.$router.push({name : 'size'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        },
        created(){
            let id=this.$route.params.id
            axios.get('/api/size/'+id)
            .then(({data})=>(this.form=data))
            .catch(console.log('error'))
        }
    }
</script>
<style>
</style>