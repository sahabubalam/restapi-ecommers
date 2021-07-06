<template>
    <div>
    <div class="container">
    <div class="py-5 text-center">
        <h2>Checkout form</h2> 
    </div>
    <div class="row">
        
        <div class="col-md-12">
            <h3 class="mb-3">Billing address</h3>
            <form class="needs-validation" novalidate="" @submit.prevent="InsertAddress">
                <div class="row">
                    <div class="col-md-4">
                        <label for="firstName">Name</label>
                        <input type="text" v-model="form.name" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                      
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Phone</label>
                        <input type="text" v-model="form.phone" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control"  placeholder="" value="" >
                       
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Address</label>
                        <input type="text" v-model="form.address" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                    </div>

                    <div class="col-md-4">
                        <label for="firstName">District</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px"  v-model="selectedDistrict" class="form-control" id="country">
                            <option value="">Choose...</option>
                            <option v-for="district in districts" :key="district.id" :value="district.id">{{district.district_name}}</option>
                        </select>
                      
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Upozela</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" v-model="form.upozela"  class="form-control" id="country">
                            <option selected="" disabled="">Choose Upozela</option>
                            <option v-for="upozela in upozelas" :key="upozela.id" :value="upozela.id">{{upozela.upozela_name}}</option>
                        </select>
                       
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Village</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" v-model="form.village"  class="form-control" id="country">
                            <option selected="" disabled="">Choose Village</option>
                            <option v-for="upozela in upozelas" :key="upozela.id" :value="upozela.id">{{upozela.upozela_name}}</option>
                        </select>
                       
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Postal Code</label>
                        <input type="text" v-model="form.postal_code"  style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                    </div>
                </div>
                    <!-- <input type="checkbox" class="custom-control-input" id="myCheck" onclick="myFunction()"> -->
                    <!-- <input type="checkbox" id="myCheck" onclick="myFunction()"> -->
                    <!-- <label>Shipping address is the same as my billing address</label> -->
             
                


                    
                   <!-- <input type="checkbox" id="abc" v-model="select" onclick="checkMe()"/> -->
                   <h3 class="mb-3">Shipping address</h3>
                   <!-- <p id="ab" style="display:none">Your Billig Address and Shipping Address Are Same</p> -->
                   
                   <div class="row" id="msg" >
                       
                   <div class="col-md-4">
                        <label for="firstName">Name</label>
                        <input type="text" v-model="form.shipping_name" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                      
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Phone</label>
                        <input type="text" v-model="form.shipping_phone" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control"  placeholder="" value="" >
                       
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Address</label>
                        <input type="text" v-model="form.shipping_address" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                    </div>

                    <div class="col-md-4">
                        <label for="firstName">District</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" v-model="shippingselectedDistrict" class="form-control" id="country">
                            <option value="">Choose...</option>
                            <option v-for="district in districts" :key="district.id" :value="district.id">{{district.district_name}}</option>
                        </select>
                      
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Upozela</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" v-model="form.shipping_upozela"  class="form-control" id="country">
                            <option selected="" disabled="">Choose Upozela</option>
                            <option v-for="upozela in shippingupozelas" :key="upozela.id" :value="upozela.id">{{upozela.upozela_name}}</option>
                        </select>
                       
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Village</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" v-model="form.shipping_village"  class="form-control" id="country">
                            <option selected="" disabled="">Choose Village</option>
                            <option v-for="upozela in shippingupozelas" :key="upozela.id" :value="upozela.id">{{upozela.upozela_name}}</option>
                        </select>
                       
                    </div>
                    <div class="col-md-4">
                        <label for="lastName">Postal Code</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" v-model="form.shipping_postal_code" class="form-control" placeholder="" value="">
                    </div>     
                      
                   </div>
               
           

               
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
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
                    name:null,
                    phone:null,
                    address:null,
                    upozela:null,
                    village:null,
                    postal_code:null,
                    shipping_name:null,
                    shipping_phone:null,
                    shipping_address:null,
                    shipping_upozela:null,
                    shipping_village:null,
                    shipping_postal_code:null,

                },
                districts:[],
                searchTerm:'',
                upozelas:'',
                selectedDistrict:'',
                shippingdistricts:[],
                shippingselectedDistrict:'',
                shippingupozelas:'',
                select:'',
            }
        },
        mounted(){
           
            
        },
        computed:{
        },
        watch:{
            selectedDistrict: function(value){
                axios.get('/api/get/upozela?district_id='+this.selectedDistrict)
                .then(response=>{
                    this.upozelas=response.data
                });
            },
            shippingselectedDistrict: function(value){
                axios.get('/api/get/shipping_upozela?spdistrict_id='+this.shippingselectedDistrict)
                .then(response=>{
                    this.shippingupozelas=response.data
                });
            },
   
        },
        methods:{
            allDistrict(){
            axios.get('/api/getting/district')
            .then(({data})=>this.districts=data)
            .catch()
        },
        InsertAddress(){
            axios.post('/api/address?district_id='+this.selectedDistrict+'&spdistrict_id='+this.shippingselectedDistrict,this.form)
                .then(()=>{
                    //this.$router.push({name : 'category'})
                    Notification.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
        }
      
        },
        created(){
        this.allDistrict();
       
  } 
    }
</script>
<style>
</style>
