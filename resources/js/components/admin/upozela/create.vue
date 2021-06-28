<template>
    <div>
    <div class="box-header with-border">
		<h4 class="box-title">Add Upozela</h4>
        <router-link to="/upozela" style="float:right;" class="btn btn-rounded btn-success mb-5"> All Upozela</router-link>
	</div>				  
        <div class="box-body">
            <form @submit.prevent="InsertUpozela">
            <div class="form-group">
               
                    <div class="col-md-12">
                        <label>District Name</label>
                        <select class="form-control"  id="select" v-model="form.district_id">
                            <option disabled="" selected="">select</option>
                            <option v-for="district in districts" :value="district.id">{{district.district_name}}</option>  
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label>Upozela Name</label>
                        <input type="text" class="form-control my-colorpicker1" v-model="form.upozela_name">
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
                    upozela_name:null,
                    district_id:null,
                },
                errors:{},
                districts:[],
            }
        },
        methods:{
            InsertUpozela(){
                axios.post('/api/store/upozela',this.form)
                .then(()=>{
                   // this.$router.push({name : 'upozela'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        },
        },
        created(){
        //district
        axios.get('/api/getting/district')
        .then(({data})=>(this.districts=data))
        }
    }
</script>
<style>
</style>