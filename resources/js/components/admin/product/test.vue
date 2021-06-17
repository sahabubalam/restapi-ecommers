<template>
    <div>
   
    <div class="col-md-4">
        <label>Category</label>

        <select class="form-control my-colorpicker1" id="select" v-model="form.color_id">
            <option >select</option>
            <option v-for="color in lists" :value="color" style="color:white;">{{color}}</option>      
        </select>
    </div>

   </div>
    
</template>
<script>
    export default{
        data(){
            return{
                form:{
                    color_id:'',
                },
               
                lists:[],
            }
        },
        methods:{
            allProduct(){
            let id=this.$route.params.id
            axios.get('/api/product/color/'+id)
            .then(({data})=>this.lists=data)
            .catch()
        },
     
        },
        created(){
        this.allProduct();
  } 
    }
</script>
<style>
</style>