<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Category</h4>
        <router-link to="/category" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Category</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="UpdateCategory">
            <div class="form-group">
               
                    <div class="col-md-12">
                        <label>Category Name</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.category_name">
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
                    category_name:null,
                },
                errors:{}
            }
        },
        methods:{
            UpdateCategory(){
                let id=this.$route.params.id
                axios.patch('/api/category/'+id,this.form)
                .then(()=>{
                    this.$router.push({name : 'category'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        },
        created(){
            let id=this.$route.params.id
            axios.get('/api/category/'+id)
            .then(({data})=>(this.form=data))
            .catch(console.log('error'))
        }
    }
</script>
<style>
</style>