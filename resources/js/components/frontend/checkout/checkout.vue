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
                        <select style="min-width:0px;height:35px;font-size:14px;border-radius:6px" class="form-control" id="country">
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                      
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Upazela</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control"  placeholder="" value="" >
                       
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Village</label>
                        <input type="text" style="min-width:0px;height:35px;font-size:10px;border-radius:6px" class="form-control" placeholder="" value="">
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
   // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())
</script>
