<template>
    <div>
    <div class="container">
    <div class="py-5 text-center">
        <h2>Checkout form</h2> 
    </div>
    <div class="row">
        
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Name</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                      
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Phone</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control"  placeholder="" value="" >
                       
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Address</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="firstName">District</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" v-model="selectedDistrict" class="form-control" id="country">
                            <option value="">Choose...</option>
                            <option v-for="district in districts" :key="district.id" :value="district.id">{{district.district_name}}</option>
                        </select>
                      
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Upozela</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px"  class="form-control" id="country">
                            <option selected="" disabled="">Choose Upozela</option>
                            <option v-for="upozela in upozelas" :key="upozela.id" :value="upozela.id">{{upozela.upozela_name}}</option>
                        </select>
                       
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Village</label>
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px"  class="form-control" id="country">
                            <option selected="" disabled="">Choose Village</option>
                            <option v-for="upozela in upozelas" :key="upozela.id" :value="upozela.id">{{upozela.upozela_name}}</option>
                        </select>
                       
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Postal Code</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
                    </div>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
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
                districts:[],
                searchTerm:'',
                upozelas:'',
                selectedDistrict:'',
            }
        },
        computed:{
        },
        watch:{
            selectedDistrict: function(value){
                axios.get('/api/get/upozela?district_id='+this.selectedDistrict)
                .then(response=>{
                    this.upozelas=response.data
                });
            }
        },
        methods:{
            allDistrict(){
            axios.get('/api/getting/district')
            .then(({data})=>this.districts=data)
            .catch()
        },
      
        },
        created(){
        this.allDistrict();
       
  } 
    }
</script>
<style>
</style>
