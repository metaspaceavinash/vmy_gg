@php
   // $logo=asset(Storage::url('uploads/logo'));
   $logo=\App\Models\Utility::get_file('uploads/logo/');
   $setting = App\Models\Utility::settings();
   $set_cookie = App\Models\Utility::cookie_settings();
   $langSetting=App\Models\Utility::langSetting();
@endphp
<!DOCTYPE html>
<html lang="en" dir="{{ $setting['SITE_RTL'] == 'on' ? 'rtl' : '' }}">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'vCardGo SaaS')}}</title>

      <link rel="icon" href="{{ $logo. '/favicon.png' }}" type="image/x-icon" />
      @include('layouts.fix-header')

<style type="text/css">
   .logo{
      max-width: 160px;
      width: 100%;
      height: 50px;
      padding: 0.33594rem 0;
   }
    .logo img {
       width: 100%;
       height: 100%;
       /* object-fit: scale-down; */
   }
   a.btn.theme-bg.try_theme_btn {
    background: #1363a9;
}
.blog{
    margin-bottom:50px;
}
.blog h2{
    font-size:1.25rem;
}

</style>

   </head>
   <body translate="no">

   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TX399K8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=677863144263844&ev=PageView&noscript=1"
/></noscript>

      <nav class="custom_navbar">
         <div class="first_side_vector">
            <img src="{{ asset('landing/assets/img/vector0.svg') }}" alt="vector0" class="img-fluid">
         </div>
         <div class="first_right_side_vector">
            <img src="{{ asset('landing/assets/img/vector.svg') }}" alt="vector" class="img-fluid">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="logo">
                     <!-- <h4>vCard<span>Go</span></h4> -->


                     <a href="{{ url('/') }}">
                     <img src="{{ asset('landing/assets/img/logo-dark.png') }}" alt=""
                              class="img-fluid" />
                  {{--   @if ($setting['cust_darklayout'] == 'on')
                        <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png').'?'.time() }}" alt=""
                              class="img-fluid" />
                     @else
                        <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png').'?'.time() }}" alt=""
                              class="img-fluid" />
                     @endif --}}
                  </a>
                  </div>
                  <ul class="nav-links">
                  <li><a href="{{ url('/') }}">Overview</a></li>
                     <li><a href="{{ url('/#functions') }}">Functions</a></li>
                     <li><a href="{{ url('/') }}">Pricing</a></li>
                     <li><a href="{{ url('/#contact') }}">Contact</a></li>
                     <li class="try-btn "><a href="{{ route('login') }}">{{__('Log in')}}</a></li>
                     @if(Utility::getValByName('signup_button') == 'on')
                     <li class="try-btn"><a href="{{ route('register') }}">{{__('Register')}}</a></li>
                     @endif
                  </ul>
                  <div class="burger">
                     <div class="line1"></div>
                     <div class="line2"></div>
                     <div class="line3"></div>
                  </div>
               </div>
            </div>
         </div>
      </nav>



<section class="blog">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 m-auto">
                <div class="blog-section">
                    <div class="blog-heading text-center">
                    <h3>
                    Shipping and Delivery 
                        <span> Policy</span>
                    </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-5">
            <!-- <h1>Shipping and Delivery Policy for vmycards.com</h1> -->

            <p>At <a href="https://vmycards.com/">vmycards.com</a>, our dedication to excellence and ensuring complete customer satisfaction is unwavering. We take pride in providing shipping services that prioritize prompt delivery. Rest assured, we are making every effort to expedite the processing and shipment of your order.</p>

    <h2>SHIPPING</h2>
    <p>All orders for our products undergo processing and are subsequently delivered within a timeframe of 5 working business days. It is important to note that orders are neither dispatched nor delivered during weekends or holidays. In instances where we are confronted with a substantial influx of orders, there may be a slight delay in the shipment process, for which we kindly request your understanding. We advise you to account for additional transit days when considering the delivery of your order. If there is a significant delay in the order shipment, we will contact you via email.</p>

    <h2>WRONG ADDRESS DISCLAIMER</h2>
    <p>Customers must ensure that the shipping address they provide is accurate. We make every effort to process and ship orders quickly, allowing for a limited opportunity to amend an incorrect shipping address. If you believe you need to provide a correct shipping address, please reach out to us without delay.</p>

    <h2>UNDELIVERABLE ORDERS</h2>
    <p>Items returned to us as undeliverable due to inaccurate shipping information may incur a restocking fee, the amount of which will be determined at our discretion.</p>

    <h2>Lost or Stolen Packages</h2>
    <p><a href="https://vmycards.com/">vmycards.com</a> is not accountable for lost or stolen packages. If your tracking information indicates that your package was delivered to your address but you have not received it, please promptly report the matter to your local authorities.</p>

    <h2>RETURN REQUEST DAYS</h2>
    <p><a href="https://vmycards.com/">vmycards.com</a> allows you to return its item(s) within a period of 3 days. Please be informed that the item(s) must be returned in their unopened, original, and unused condition.</p>

    <h2>OUT-OF-STOCK ITEM PROCESS</h2>
    <p>In the event there are items that are out of stock at <a href="https://vmycards.com/">vmycards.com</a>, we request you to wait for all items to be in stock before dispatching.</p>

    <h2>Import Duty and Taxes</h2>
    <p>When transacting with <a href="https://vmycards.com/">vmycards.com</a>, you have the following choices regarding taxes and import duties: You may be responsible for paying the necessary fees when the items reach your destination country.</p>

    <h2>Acknowledgment</h2>
    <p>By accessing our website and making a purchase, you willingly agree to the terms outlined in this Shipping Policy.</p>

    <h2>Contact Information</h2>
    <p>If you have any questions or wish to provide feedback, kindly get in touch with us using the following contact information: <a href="mailto:support@metaspacechain.com">support@metaspacechain.com</a>.</p>

                </div>
            </div>
    </div>

</section>
<section>
@include('layouts.fix-footer')
</section>

      <script
         src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
      <script id="rendered-js">
         const navSlide = () => {
           const burger = document.querySelector('.burger');
           const body = document.querySelector('body');
           const nav = document.querySelector('.nav-links');
           const navLinks = document.querySelectorAll('.nav-links li');

           //Toggle Nav v
           burger.addEventListener('click', () => {
             nav.classList.toggle('nav-active');

             //Animate Links
             navLinks.forEach((link, index) => {
               if (link.style.animation) {
                 link.style.animation = '';
               } else {
                 link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;

               }
             });

             //burger animation
             burger.classList.toggle('toggle');
             body.classList.toggle('scroll-hidden');


           });
         };

         navSlide();
         //# sourceURL=pen.js
      </script>
   </body>
   @if($set_cookie['enable_cookie'] == 'on')
   @include('layouts.cookie_consent')
   @endif
</html>
@php
  exit();
@endphp
