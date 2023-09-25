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

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('landing/assets/css/style.css') }}">
      <!-- Stylesheets -->
      <!-- <link rel="stylesheet" href="./assets/css/docs.theme.min.css"> -->
      <!-- Owl Stylesheets -->
      <link rel="stylesheet" href="{{ asset('landing/assets/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('landing/assets/css/owl.theme.default.min.css') }}">
      <script src="{{ asset('landing/assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('landing/assets/js/owl.carousel.js') }}"></script>

      @if ($setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    @if (isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">

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
                     <img src="{{ asset('landing/assets/img/logo-dark.png') }}" alt=""
                              class="img-fluid" />
                  {{--   @if ($setting['cust_darklayout'] == 'on')
                        <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png').'?'.time() }}" alt=""
                              class="img-fluid" />
                     @else
                        <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png').'?'.time() }}" alt=""
                              class="img-fluid" />
                     @endif --}}
                  </div>
                  <ul class="nav-links">
                     <li><a href="#">Overview</a></li>
                     <li><a href="#">Functions</a></li>
                     <li><a href="#">Pricing</a></li>
                     <li><a href="#">Contact</a></li>
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
            <div class="row">
               <div class="col-lg-6 col-md-12">
                  <div class="blog-section">
                     <div class="blog-heading">
                        <h3>
                        Empowering Connections<br> <span> Next-Gen Digital Cards  </span>
                        </h3>
                        <p class="text_gray">
                        Experience a 30-day <strong>FREE</strong> Trial that helps you connect with people easily and build important relationships.
                        </p>
                        <div class="btns_main">
                           <a href="{{ route('login') }}" class="theme-bg try_theme_btn">
                            <span class="text-white">Get Started</span>
                           </a>
                           <!-- <a href="#" class="btn second_btn try_theme_btn">
                           <span class="text-dark">Find more functions</span>
                           </a> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="blog-image text-center">
                     <img src="{{ asset('landing/assets/img/hero.png') }}" alt="hero" class="img-fluid">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- <section class="logo_slider theme-bg">
         <div class="container">
            <div class="row">
               <div class="logo_slider_main">
                  <ul class="conterhere">

                  <li>
                     <h3>15k </h3>
                         <p></p>
                     </li>


                     <li>
<h3>15k </h3>
<p> App Users</p>
                     </li>
                     <li>
                     <h3>20k </h3>
<p>Card Users</p>
                     </li>
                     <li>
                     <h3>300k+</h3>
<p>Business User</p>
                     </li>

                  </ul>
               </div>
            </div>
         </div>
      </section> -->

<style>


.sectitle p {
    font-weight: 400;
    font-size: 18px;
}

.slidercap h1 span {
    font-weight: bold;
}
.slidercap h1 {
    font-size: 60px;
}
ul.imgsmgroup {
    display: flex;
}
ul.imgsmgroup li {
    margin-left: -20px;
}
.exabox .countbox {

    width: 265px;
    border-right: 1px solid #ccc;
    position: relative;
}



.exabox .countbox:before {
    content: "";
    position: absolute;
    background: #4FF027;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    bottom: 6px;
    left: -18px;
}
.countbox h6 {
    font-size: 34px;
    color: #fff;
}
.countbox p{
    font-size: 16px;
    color: #fff;
}
</style>

      <div class="counterslider logo_slider theme-bg">
  <div class="container">
    <div class="row rowstyle">
      <div class="col-12 col-sm-5 col-lg-5 col-xl-5">

        <div class="row">
          <div class="col-12 col-sm-4 col-lg-4 col-xl-4">
            <ul class="imgsmgroup">
              <li><img src=" {{ asset('landing/assets/img/a1.png') }}" class="smimg"></li>
              <li><img src=" {{ asset('landing/assets/img/a2.png') }}" class="smimg"></li>
              <li><img src=" {{ asset('landing/assets/img/a3.png') }}" class="smimg"></li>
              <li><img src=" {{ asset('landing/assets/img/a4.png') }}" class="smimg"></li>
            </ul>
          </div>
          <div class="col-12 col-sm-8 col-lg-8 col-xl-8 exabox">
            <div class="countbox">
              <h6>100</span>+</h6>
            <p>
              Countries Worldwide Shipping
            </p>
          </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-sm-7 col-lg-7">
        <div class="row">

        <div class="col-12 col-lg-4">
          <div class="countbox">
            <h6> 15</span>k</h6>
          <p>
            App Users
          </p>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="countbox">
          <h6>  20</span>k</h6>
        <p>
          Card Users
        </p>
      </div>
    </div>
          <div class="col-12 col-lg-4">
            <div class="countbox">
              <h6>  300</span>+</h6>
            <p>
              Business User
            </p>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <section class="services-section" id="services">
         <div class="container">
            <div class="mb-5 text-center">
               <div class="bg_vector">
                  <img src="{{ asset('landing/assets/img/bg_vector.svg') }}" alt="bg_vector" class="img-fluid">
               </div>
               <div class="blog-heading">
                  <h3>
                    ULTIMATE <br> <span>  NFC Business Card   </span>
                  </h3>
                  <p class="section_paragragh">
                  Experience the future of networking with multiple payment gateway links that set us apart from competitors.
                  </p>
               </div>
            </div>
            <div class="row align-items-center justify-content-center">
               <div class="d-md-flex d-block align-items-center justify-content-center w-100">
                  <div class="product-details">
                     <div class="product-image">
                        <img src="{{ asset('landing/assets/img/Icon.svg') }}" alt="Icon1" class="img-fluid hover-hide">
                        <img src="{{ asset('landing/assets/img/Icon-black.svg') }}" alt="Icon1" class="img-fluid hover-show">
                     </div>
                     <div class="product-text">
                        <p>Custom Branding
                           <span>
                           Like a Mini Website
                           </span>
                        </p>
                     </div>
                  </div>
                  <div class="product-details">
                     <div class="product-image">
                        <img src="{{ asset('landing/assets/img/Icon.svg') }}" alt="Icon1" class="img-fluid hover-hide">
                        <img src="{{ asset('landing/assets/img/Icon-black.svg') }}" alt="Icon1" class="img-fluid hover-show">
                     </div>
                     <div class="product-text">
                        <p>Social Media Links
                           <span>
                           Connect, Share, Engage
                           </span>
                        </p>
                     </div>
                  </div>
                  <div class="product-details">
                     <div class="product-image">
                        <img src="{{ asset('landing/assets/img/Icon.svg') }}" alt="Icon1" class="img-fluid hover-hide">
                        <img src="{{ asset('landing/assets/img/Icon-black.svg') }}" alt="Icon1" class="img-fluid hover-show">
                     </div>
                     <div class="product-text">
                        <p>Portfolio Listing
                           <span>
                           Showcase Your Work
                           </span>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="position_relative">
                  <div class="mockup_img">
                     <img src="{{ asset('landing/assets/img/mockup.png') }}" alt="mockup" class="img-fluid">
                  </div>
                  <div class="bg_vector_two">
                     <img src="{{ asset('landing/assets/img/bg_vector.svg') }}" alt="bg_vector" class="img-fluid">
                  </div>
                  <div class="vector_2">
                     <img src="{{ asset('landing/assets/img/Vector2.svg') }}" alt="Vector2" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="row">
            </div>
         </div>
      </section>
      <section class="blog">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6 col-md-12 respo-order-2">
                  <div class="blog-section">
                     <div class="blog-heading">
                        <h3>
                        The future of
                           <br>
                           <span> digital cards is here. </span>
                        </h3>
                        <p>With features like calendar integration, you can get notified if someone book an appointment with you. Truly professional.
                        </p>
                        <div class="btns_main">
                           <a href="{{ route('login') }}" class="btn theme-bg try_theme_btn">
                           <span class="text-white">Try vCardGo</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="blog-image text-center">
                     <img src="{{ asset('landing/assets/img/blog1.png') }}" alt="blog" class="img-fluid">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="blog">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6 col-md-12">
                  <div class="blog-image">
                     <img src="{{ asset('landing/assets/img/card-img.png') }}" alt="hero" class="img-fluid">
                     <div class="blog-image_bg_img">
                        <img src="{{ asset('landing/assets/img/bg_vector.svg') }}" alt="bg_vector" class="img-fluid">
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12 respo-order-2">
                  <div class="blog-section">
                     <div class="blog-heading">
                        <h3>
                        Diverse Styles
                           <br>
                           <span> & Templates </span>
                        </h3>
                        <p>We believe in the power of connection and innovation to empower businesses with cutting-edge networking solutions.
                        </p>
                        <div class="btns_main">
                           <a href="{{ route('login') }}" class="btn theme-bg try_theme_btn">
                              <span class="text-white">Try vCardGo</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="vector_3">
                  <img src="{{ asset('landing/assets/img/Vector3.svg') }}" alt="Vector2" class="img-fluid">
               </div>
            </div>
         </div>
      </section>
      <section class="blog all_techcard_img"  id="demos">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-12 col-md-12 m-auto">
                  <div class="blog-section">
                     <div class="blog-heading text-center">
                        <h3>
                        Contactless Digital Cards
                           <br>
                           <span> One Tap Share </span>
                        </h3>
                        <p>Our NFC business card is perfect for big businesses, self-employed, influencers, doctors, or artists. <br>It is affordable and keeps you tech-savvy.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="columns">
                  <ul class="owl-carousel owl-theme">
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard1.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard01.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard2.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard02.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard3.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard03.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard4.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard04.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard5.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard05.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard6.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard06.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard7.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard07.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard8.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard08.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard9.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard09.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard10.png') }}" alt="techcard1" class="img-fluid"></li>
                     <li class="items"><img src="{{ asset('landing/assets/img/cards/vcard010.png') }}" alt="techcard1" class="img-fluid"></li>
                  </ul>
               </div>
               <div class="vector_4">
                  <img src="{{ asset('landing/assets/img/bg_vector.svg') }}" alt="Vector2" class="img-fluid">
               </div>
               <script>
                  $(document).ready(function() {
                    $('.owl-carousel').owlCarousel({
                      loop:true,
                      nav:true,
                      margin: 10,
                      responsiveClass: true,
                      rtl: true,
                      responsive: {
                        0: {
                          items: 1,
                          nav: true
                        },
                        600: {
                          items: 3,
                          nav: false
                        },
                        1000: {
                          items: 6,
                          nav: true,
                          loop: true,
                          margin: 20
                        }
                      }
                    })
                  })
               </script>
            </div>
         </div>
         </div>
         <nav class="custom_navbar">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="logo footer_logo">
                        <h4><img src="{{ asset('landing/assets/img/logo-dark.png') }}"></h4>
                     </div>
                     <ul class="nav-links footer-nav-links ">
                        <!-- <li class="text-muted">Copyright © &nbsp;{{ isset($langSetting['footer_text']) ? $langSetting['footer_text'] : config('app.name', 'vCardGo-SaaS') }} {{ date('Y') }}</li> -->
                        <li class="text-muted">Copyright © &nbsp;{{ isset($langSetting['footer_text']) ? $langSetting['footer_text'] : 'Metaspace' }} {{ date('Y') }}</li>
                     </ul>
                  </div>
               </div>
            </div>
         </nav>
      </section>
      <script
         src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
      <script id="rendered-js">
         const navSlide = () => {
           const burger = document.querySelector('.burger');
           const body = document.querySelector('body');
           const nav = document.querySelector('.nav-links');
           const navLinks = document.querySelectorAll('.nav-links li');

           //Toggle Nav
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
