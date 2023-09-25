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
                    Cancellation &
                        <span>  Refund Policy</span>
                    </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-5">
                    <p>This Cancellation and Refund Policy outlines the terms and conditions governing cancellations and refunds for products and services purchased from vmycards.com ("the Website"). <br/>By purchasing from our Website, you agree to the terms stated herein.</p>
                    <h2>Cancellation Policy</h2>
                    <p>
                        <strong>a. Order Cancellation:</strong> Customers may request to cancel their order within 24 hours after the purchase. Requests for cancellation after this period will be subject to the terms outlined below.
                    </p>
                    <p>
                        <strong>b. Service Subscription Cancellation:</strong> Customers with service subscriptions may cancel their subscription at any time, subject to the terms outlined below.
                    </p>

                    <h2>Refund Policy</h2>
                    <p>
                        <strong>a. Products:</strong> Refunds for products will be considered if the request is made within 3-4 working days of the purchase date. The product must be unused and in its original packaging. Refunds may be subject to a restocking fee.
                    </p>
                    <p>
                        <strong>b. Services:</strong> Refunds for services will be considered if the request is made within 2 business days of the purchase date. The refund amount may be prorated based on the portion of the service that has been delivered.
                    </p>

                    <h3>Non-Refundable Items and Services:</h3>
                    <p>
                        Certain items and services are non-refundable, including but not limited to [list non-refundable items/services]. These items/services are clearly indicated as non-refundable at the time of purchase.
                    </p>

                    <h2>Refund Process</h2>
                    <p>
                        <strong>a. To request a refund, customers must contact our customer support team at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a> with their order details.</strong>
                    </p>
                    <p>
                        <strong>b. Refunds will be issued to the original payment method used for the purchase. Processing times for refunds may vary based on the payment provider.</strong>
                    </p>

                    <h2>Exceptions</h2>
                    <p>
                        <strong>a. In cases where the product or service received is defective or materially different from what was advertised, customers may be eligible for a full refund or replacement.</strong>
                    </p>
                    <p>
                        <strong>b. Events beyond our control (e.g., natural disasters, technical failures) may result in disruptions to services. In such cases, refunds may be provided at our discretion.</strong>
                    </p>

                    <h2>Changes to Policy</h2>
                    <p>
                        vmycards.com reserves the right to modify or update this Cancellation and Refund Policy at any time. Changes will be effective upon posting on the Website. Customers are advised to review the policy periodically.
                    </p>

                    <h2>Contact Information</h2>
                    <p>
                        For questions or concerns regarding cancellations and refunds, customers can contact our customer support team at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a>.
                    </p>

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
   
 <!-- Meta Pixel Code -->
 <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '677863144263844');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=677863144263844&ev=PageView&noscript=1"/></noscript>
  <!-- End Meta Pixel Code -->

  
</html>
@php
  exit();
@endphp
