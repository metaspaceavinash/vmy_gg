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
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 m-auto">
                <div class="blog-section">
                    <div class="blog-heading text-center">
                    <h3>
                    Privacy
                        <span> Policy</span>
                    </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-5">
            <!-- <p>
                <strong>Introduction:</strong>
            </p> -->
            <p>At vmycards.com, we are committed to protecting the privacy and security of our users' personal information. This Privacy Policy outlines how we collect, use, disclose, and protect your data when you interact with our website.</p>
            <p>
                <h2>Information We Collect:</h2>
            </p>
            <p>- Personal Information: We may collect personal information such as your name, email address, and contact details when you register an account, subscribe to our newsletter, or use our services.</p>
            <p>- Usage Information: We gather data on how you interact with our website, including your browsing activity, pages visited, and interactions with features.</p>
            <p>
                <h2>How We Use Your Information:</h2>
            </p>
            <p>- Provide Services: We use your information to deliver the services you requested, such as processing transactions and delivering products.</p>
            <p>- Communication: We may use your contact information to send you updates, promotions, and important notices.</p>
            <p>- Improving Services: Your data helps us understand user preferences and behaviors, allowing us to enhance our website and services.</p>
            <p>- Legal Requirements: We may share your information if required by law or to protect our rights, safety, and property.</p>
            <p>
                <h2>Cookies and Tracking:</h2>
            </p>
            <p>We use cookies and similar tracking technologies to improve your browsing experience, analyze site traffic, and personalize content. You can manage your cookie preferences through your browser settings.</p>
            <p>
                <h2>Third-Party Services:</h2>
            </p>
            <p>We may use third-party services, such as analytics and payment processors, to enhance our website's functionality. These third parties may have their own privacy policies.</p>
            <p>
                <h2>Data Security:</h2>
            </p>
            <p>We employ industry-standard security measures to safeguard your data from unauthorized access, disclosure, or misuse.</p>
            <p>
                <h2>Your Choices:</h2>
            </p>
            <p>- You can update your personal information by logging into your account.</p>
            <p>- You can opt-out of receiving marketing communications by following the unsubscribe instructions in our emails.</p>
            <p>- You can disable cookies through your browser settings.</p>
            <p>
                <h2>Children's Privacy:</h2>
            </p>
            <p>Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children.</p>
            <p>
                <h2>Changes to This Policy:</h2>
            </p>
            <p>We may update this Privacy Policy periodically to reflect changes in our practices. We encourage you to review the policy whenever you visit our website.</p>
            <p>
                <h2>Contact Us:</h2>
            </p>
            <p>If you have questions or concerns about our Privacy Policy, you can contact us at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a>. </p>

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
<?php /**PATH /var/www/vmycards-2/resources/views/layouts/privacy.blade.php ENDPATH**/ ?>