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
        <li >
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">

                    <span class="nameinfo">Abhinash ,Mobile No. - 9876543210, demo@gmail.com</span><br>
                    5th Floor, 8 Square Tower, Plot No. 8, Sector 125, Noida, Uttar Pradesh 201303
                </label>
              </div>
              <button class="btnedit" data-bs-toggle="modal" data-bs-target="#addressform">Edit Address</button>
        </li>
        <li>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    <span class="nameinfo">Abhinash ,Mobile No. - 9876543210, demo@gmail.com</span><br>
                    5th Floor, 8 Square Tower, Plot No. 8, Sector 125, Noida, Uttar Pradesh 201303
                </label>
              </div>
              <button class="btnedit" data-bs-toggle="modal" data-bs-target="#addressform">Edit Address</button>
        </li>
    </ul>
</div>
    </div>
</div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="iinerboxxx ">
                <h1 class="name">Plan Summery</h1>
                <div class="orderbox">
                    <p>Plan Name : Premium Plan </p>
                    <p>NPhysical Card Balance : 03/10</p>
                    <p>PVC Card Balance : 2/3 </p>
                    <p>Metel Card Balance: 2/3</p>

                    </div>
            </div>
            <div class="iinerboxxx mt-4">
                <h1 class="name">Order Summery</h1>
                <div class="orderbox">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between 5h-sm py-3">
                            <div class="d-flex">
                            <img src="https://dummyimage.com/70x50/000/fff" class="img-fluid ">
                          <div class="ms-2">
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                        </div>
                          <span class="text-muted">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Discont</span>
                            <strong>- $10</strong>
                          </li>
                        <li class="list-group-item d-flex justify-content-between">
                          <span>Total Amount</span>
                          <strong>$20</strong>
                        </li>
                      </ul>
                      <form class="card p-2 bg-dark">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Promo code">
                          <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                      </form>

                      <button type="submit" class="btn btn-primary" name="save">Order Now</button>
                      <button type="submit" class="btn btn-primary" name="save">Pay Now</button>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addressform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" name="form_address"  id="form_address" method="POST" action="<?php echo e(route('store_shipping_address')); ?>" >
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                       <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Full Name</label>
                    <input type="text" class="form-control clear_string" placeholder="Full Name" name="fullname" value="" required="">
                    <span class="error text-danger" >These credentials do not match our records.</span>
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
  </div><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/shipping_address_form.blade.php ENDPATH**/ ?>