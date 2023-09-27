<style>
        ul.addresss li {
    border-bottom: 1px solid #ccc;
    padding: 30px;
}
ul.addresss { border: 1px solid #ccc;}

button.btn.btn-submitform {
    background: #1076c0;
    color: #fff;
    padding: 4px 22px;
    font-weight: bold;
}

h1.name {
    font-size: 20px;
    margin-bottom: 13px;
    font-weight: bold;
}

.iinerboxxx {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    background: #fcfcfc;
    padding: 13px 19px;
    border-radius: 9px;
}

ul.addresss {
    list-style: none;
    padding: 0px;
}

li.activeaddress {
    background: #5e819a;
    color: #fff;
}

ul.addresss li {
    display: flex;
    justify-content: space-between;
}

button.btnedit {
    background: #1076c0;
    border: 0px;
    color: #fff;
    font-size: 12px;
    height: 26px;
    border-radius: 4px;
}
span.nameinfo {
    font-weight: 600;
}

.btn-sec {
    display: flex;
    justify-content: end;
}
    </style>
    <br/>
    <br/>
    <form name="card_request" id="card_request" action="/card_request" method="post">
    
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="iinersec">
<div class="row mb-4">
    <div class="col-12 col-lg-12">
<div class="iinerboxxx">
    <h1 class="name">Delivery Address</h1>
    <div class="btn-sec">
    <button type="button" class="btn btn-submitform mb-3" data-bs-toggle="modal" data-bs-target="#addressform">
        Add a new address +
      </button>
    </div>
    <ul class="addresss">
       
    <?php foreach($rs as $ke=>$r){ ?>
        <li>
            <div class="form-check">
                <input class="form-check-input radio_address" type="radio" name="flexRadioDefault" id="ff_{{ $r->id }}" val="{{ $r->id  }}">
                <label class="form-check-label" for="ff_{{ $r->id  }}">
                    <span class="nameinfo">
                    {{ $r->fullname }}
                    {{ $r->mobile1	}}	
                    {{ $r->mobile2 }}	
                    {{ $r->email }}	
                    </span>
                    <br/>
                    {{ $r->address1 }}	
                    {{ $r->address2 }}
                    {{ $r->city }}
                    {{ $r->state }}
                    {{ $r->country }}
                    {{ $r->pincode }}	
                    {{ $r->location_url }}	
                    {{ $r->landmark }}
                    {{ $r->address_type }}
                </label>
              </div>
              <button class="btnedit d-none" data-bs-toggle="modal" data-bs-target="#addressform">Edit Address</button>
        </li>
    <?php } ?>


    </ul>
</div>
    </div>
</div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="iinerboxxx ">
                <h1 class="name">Plan Summary </h1>
                <div class="orderbox">
                    <p>Plan Name : {{ $plan->name }}  </p>
                    <p class="d-none">Physical Card Balance : {{ $PVC_COUNT+$METAL_COUNT }} / {{ $plan->no_of_pvc_card+$plan->no_of_metal_card }} </p>
                    @if($plan->enable_physical_pvc=='on')
                    <p class="">PVC Card Balance : @if($plan->no_of_pvc_card-$PVC_COUNT < 0) {{ '0' }} @else {{ $plan->no_of_pvc_card-$PVC_COUNT }} @endif / {{ $plan->no_of_pvc_card }} </p>
                    @endif

                    @if($plan->enable_physical_metal=='off')
                    <p  >Metel Card Balance: {{ $METAL_COUNT }} / {{ $plan->no_of_metal_card }} </p>
                    @endif
                    <div class="row d-none">
                       <div class="col-6 col-lg-6">
                    <select name="card_type" id="card_type" class="form-control">
                            <option value="PVC">PVC Card</option>
                            <option value="METAL">Metal Card</option>
                      </select> </div>
                      
                      <div class="col-6 col-lg-6">
                      <button type="button" id="updateCardType" card-req-id="{{ $card_request_deatails->id }}" class="btn btn-primary ">Choose</button>
                           </div>
                           </div>
                  </div>
            </div>
            <div id="orderSummery" class="iinerboxxx mt-4 ">
                <h1 class="name">Order summary</h1>
                <div class="orderbox">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between 5h-sm py-3">
                            <div class="d-flex">
                            <!-- https://dummyimage.com/70x50/000/fff -->
                            <img src="{{ env('APP_URL') }}/assets/card-images/{{ $card_request_deatails->card_id?$card_request_deatails->card_id:1 }}FrontBlank.png" width="70px" height="50px" class="img-fluid ">
                          <div class="ms-2">
                            <h6 class="my-0">{{ $card_request_deatails->name }}</h6>
                            <small class="text-muted">{{ $card_request_deatails->designation }}</small>
                          </div>
                        </div>
                          <span   class="text-muted _price">{{ env('CARD_PRICE_PVC') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Discount</span>
                            <strong>- 0</strong>
                          </li>
                        <li class="list-group-item d-flex justify-content-between">
                          <span>Total Amount</span>
                          <strong class="_price">{{ env('CARD_PRICE_PVC') }}</strong>
                        </li>
                      </ul>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Promo code">
                          <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
@if($plan->no_of_pvc_card-$PVC_COUNT>0)
<button type="submit" class="btn btn-primary _ordernow  mt-4 payraz"  name="save">Order Now</button>
@else 
                      <div class="d-grid text-center _paynow mt-4">
                          <a href="{{ route('phy_stripe', \Illuminate\Support\Facades\Crypt::encrypt($card_request_deatails->id)) }}"
                              class="btn  btn-primary d-flex justify-content-center align-items-center  payraz ">     {{ 'Pay Now' }}
                              <i class="fas fa-arrow-right m-1"></i></a>
                          <p></p>
                      </div>

                      @endif
                </div>
            </div>
        </div>
    </div>
</div>


        <input type="hidden" name="card_req_id" id="card_req_id" value="{{ $card_request_deatails->id }}" />

      </form>




<!-- Modal -->
<div class="modal fade" id="addressform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" name="form_address"  id="form_address" method="POST" action="{{ route('store_shipping_address') }}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Full Name</label>
                    <input type="text" class="form-control clear_string" placeholder="Full Name" name="fullname" value="" required="">
                    <span class="error text-danger d-none" >These credentials do not match our records.</span>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Email</label>

                    <input type="email" class="form-control clear_string" placeholder="Email" name="email" value="">
                </div>
                <div class="col-6">
                  <label for="inputEmail4" class="form-label">Mobile Number</label>

                    <input type="number" class="form-control" placeholder="Mobile Number" name="mobile1" value="" required="">
                </div>
                <div class="col-6">
                  <label for="inputEmail4" class="form-label">Alternate Mobile</label>

                    <input type="number" class="form-control clear_string" maxlength="10" minlength="10" placeholder="Alternae Mobile Number" name="mobile2" value="">
                </div>
                   <br/>
                <hr/>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Address1 (Flat No/ Building / Appartment)</label>
                  <input type="text" class="form-control" id="address1" name="address1" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label">Address 2 (Street / Sector/ Area)</label>
                  <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">State</label>
                  <input type="text" class="form-control" id="state" name="state">
                   
                </div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">Zipcode</label>
                  <input type="number" class="form-control" id="zipcode" name="zipcode" >
                </div>
                <div class="col-md-12">
                    <label for="inputZip" class="form-label">Landmark</label>
                  <input type="text" class="form-control" id="landmark" name="landmark">
                    <!-- <textarea class="form-control clear_string" rows="3" placeholder="" name=""></textarea> -->
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>


$(document).on('click', '.payraz', function() {
   
  var selectedGender ='';
  selectedGender = $("input[name='flexRadioDefault']:checked").val();


  // if($('.radio_address').prop('checked')=='true'){

  if(selectedGender!='on'){
    alert("Please select shipping address");
    return false;
  }   
 if(confirm( 'Are You sure to proceed to now?')){
    return true;
  }else{
    return false;

  }


})




$(document).on('click', '#updateCardType', function() {

  var card_type=$('#card_type').val();
  var card_req_id=$(this).attr('card-req-id');
  // console.log(card_type,card_req_id);
    $.ajax({
        url: '{{ route('update_cart_type') }}',
        type: 'GET',
        datType: 'json',
        data: {
            card_type:card_type,
            card_req_id:card_req_id,
        },
        headers: {
            'Content-Type': 'application/json'
        },
        success: function(data) {
            if (data == true) {

              $('#orderSummery').removeClass('d-none');

              $('._price').text('9999');
              $('.ordernow').removeClass('d-none');
              $('#orderSummery').removeClass('d-none');
              $('._price').text('9999');
              $('._price').text('9999');
                toastrs('{{ __('Success') }}', 'Updated Successfully', 'success');
            } else {
                toastrs('{{ __('Error') }}', 'Coupon code is required', 'error');
            }
        }
    })
})

  </script>