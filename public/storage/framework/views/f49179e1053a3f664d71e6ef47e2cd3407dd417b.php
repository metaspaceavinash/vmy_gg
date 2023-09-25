<?php
   // $logo=asset(Storage::url('uploads/logo'));
   $logo=\App\Models\Utility::get_file('uploads/logo/');
   $setting = App\Models\Utility::settings();
   $set_cookie = App\Models\Utility::cookie_settings();
   $langSetting=App\Models\Utility::langSetting();
?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'vCardGo SaaS')); ?></title>

      <link rel="icon" href="<?php echo e($logo. '/favicon.png'); ?>" type="image/x-icon" />
      <?php echo $__env->make('layouts.fix-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
.accordion-item {
    background: #edf2f7;
}
</style>

   </head>
   <body translate="no">
      <nav class="custom_navbar">
         <div class="first_side_vector">
            <img src="<?php echo e(asset('landing/assets/img/vector0.svg')); ?>" alt="vector0" class="img-fluid">
         </div>
         <div class="first_right_side_vector">
            <img src="<?php echo e(asset('landing/assets/img/vector.svg')); ?>" alt="vector" class="img-fluid">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="logo">
                     <!-- <h4>vCard<span>Go</span></h4> -->


                     <a href="<?php echo e(url('/')); ?>">
                     <img src="<?php echo e(asset('landing/assets/img/logo-dark.png')); ?>" alt=""
                              class="img-fluid" />
                  
                  </a>
                  </div>
                  <ul class="nav-links">
                     <li><a href="<?php echo e(url('/')); ?>">Overview</a></li>
                     <li><a href="<?php echo e(url('/#functions')); ?>">Functions</a></li>
                     <li><a href="<?php echo e(url('/')); ?>">Pricing</a></li>
                     <li><a href="<?php echo e(url('/#contact')); ?>">Contact</a></li>
                     <li class="try-btn "><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Log in')); ?></a></li>
                     <?php if(Utility::getValByName('signup_button') == 'on'): ?>
                     <li class="try-btn"><a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                     <?php endif; ?>
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




<section class="faq py-5 " id="faqs">
  <div class="container">
  <div class="row align-items-center mb-5">
            <div class="col-lg-12 col-md-12 m-auto">
                <div class="blog-section">
                    <div class="blog-heading text-center">
                    <h3>
                    VmyCards
                        <span> (FAQ's)</span>
                    </h3>
                    </div>
                </div>
            </div>
        </div>



        <div class="accordion accordion-flush row" id="accordionFlushExample">

          <div class="col-12 col-lg-6">
          <div class="accordion-item">
            <h2 class="accordion-header show" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sa" aria-expanded="false" aria-controls="flush-collapseOne">
                What Is A Digital Business Card?

              </button>
            </h2>
            <div id="sa" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">It is a digital card for sending contact details electronically, replacing outdated visiting cards. It is a personalized, interactive digital card that simplifies networking for you.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sb" aria-expanded="false" aria-controls="flush-collapseTwo">
                What Is A Vmycards Business Card?

              </button>
            </h2>
            <div id="sb" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">It is designed for busy professionals who attend meetings, tradeshows, or seminars to quickly share their business details without the hassle of manual sharing.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sc" aria-expanded="false" aria-controls="flush-collapseThree">
                Tell Us How vMyCards Works?

              </button>
            </h2>
            <div id="sc" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Vmycards lets you create, share, and update digital business cards via their user-friendly platform with the help of powerful technologies like NFC.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                How Many Digital Business Cards Can I Create?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">With Vmycards, you can create as many digital business cards as you need to suit various networking and business situations.
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
<div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Will My Digital Business Card Be Mobile Friendly?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, Vmycards ensures your digital business card is mobile-friendly, making it accessible and user-friendly on smartphones.</div>
          </div>
          </div>


          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                How do I Share my Digital Business Card?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Sharing your digital business card with Vmycards is simple; just tap your card on the back of a phone or access it through a QR code. But first, you need to sign up and create an account with us.
              </div>
          </div>

      </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q7" aria-expanded="false" aria-controls="q7">
                Does Vmycards Require A Subscription?

              </button>
            </h2>
            <div id="q7" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Vmycards offers an astonishing deal, with unparalleled pricing at a mere 30 Rupees per month! If this isn't convincing enough, you get the card for free.

              </div>
          </div>
        </div>
</div>
        </div>
      </div>

</section>
<section>
<?php echo $__env->make('layouts.fix-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
   <?php if($set_cookie['enable_cookie'] == 'on'): ?>
   <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>

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
<?php
  exit();
?>
<?php /**PATH /var/www/vmycards-2/resources/views/layouts/faqs.blade.php ENDPATH**/ ?>