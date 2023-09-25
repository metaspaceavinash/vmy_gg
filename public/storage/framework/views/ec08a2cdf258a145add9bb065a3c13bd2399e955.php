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



<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 m-auto">
                <div class="blog-section">
                    <div class="blog-heading text-center">
                    <h3>
                    Terms &
                        <span>  Conditions</span>
                    </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 pt-5">

                <h2>1. Acceptance of Terms:</h2>
                <p>By accessing and using vmycards.com, you agree to comply with and be bound by these Terms and Conditions.</p>

                <h2>2. Use of the Website:</h2>
                <p>
                a. <strong>Eligibility:</strong> You must be at least 18 years old to use this Website.<br>
                b. <strong>User Account:</strong> You may need to create an account to access certain features. You are responsible for maintaining the confidentiality of your account information and are liable for all activities that occur under your account.
                </p>

                <h2>3. Intellectual Property:</h2>
                <p>
                a. <strong>Ownership:</strong> All content on the Website, including text, images, logos, and trademarks, is the property of vmycards.com and is protected by copyright and other intellectual property laws.<br>
                b. <strong>Limited License:</strong> You are granted a limited, non-exclusive, non-transferable license to access and use the content for personal, non-commercial purposes.
                </p>

                <h2>4. User Content:</h2>
                <p>
                a. <strong>Responsibility:</strong> You are responsible for any content you submit to the Website. You grant vmycards.com a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, and distribute your content.<br>
                b. <strong>Prohibited Content:</strong> You may not submit content that is illegal, defamatory, obscene, or violates the rights of others.
                </p>

                <h2>5. Privacy Policy:</h2>
                <p>Your use of the Website is also governed by our <a href="https://vmycards.com/privacy-policy">Privacy Policy</a>, which outlines how we collect, use, and protect your information.</p>

                <h2>6. Limitation of Liability:</h2>
                <p>
                a. <strong>Disclaimer:</strong> The Website and its content are provided "as is" without any warranties, express or implied.<br>
                b. <strong>Limitation of Liability:</strong> vmycards.com shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the Website.
                </p>

                <h2>7. Indemnification:</h2>
                <p>You agree to indemnify and hold vmycards.com, its employees, and affiliates harmless from any claims, liabilities, damages, losses, and expenses arising from your use of the Website or violation of these Terms.</p>

                <h2>8. Changes to Terms:</h2>
                <p>vmycards.com reserves the right to modify or update these Terms and Conditions at any time. Changes will be effective upon posting on the Website. Your continued use of the Website after changes constitutes acceptance of the updated Terms.</p>

                <h2>9. Governing Law and Jurisdiction:</h2>
                <p>These Terms are governed by and construed in accordance with the laws of [Your Jurisdiction]. Any disputes arising from these Terms shall be subject to the exclusive jurisdiction of the courts in [Your Jurisdiction].</p>

                <h2>10. Contact Information:</h2>
                <p>If you have any questions or concerns regarding these Terms and Conditions, you can contact us at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a>.</p>

            </div>
        </div>
    </div>
</section>

<section>
<?php echo $__env->make('layouts.fix-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php /**PATH /var/www/vmycards-2/resources/views/layouts/tcc.blade.php ENDPATH**/ ?>