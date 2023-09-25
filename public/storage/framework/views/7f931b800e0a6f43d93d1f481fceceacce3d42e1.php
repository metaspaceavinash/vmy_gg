<?php
    
    // get theme color
    $setting = App\Models\Utility::colorset();
    $layout_setting = App\Models\Utility::getLayoutsSetting();
    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';
    $company_logo = \App\Models\Utility::GetLogo();
    
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    
    $company_favicon = Utility::getValByName('company_favicon');
    $set_cookie = App\Models\Utility::cookie_settings();
    $lang=app()->getLocale('lang');
    if ($lang == 'ar' || $lang == 'he') {
        $setting['SITE_RTL'] = 'on';
    }
    $langSetting=App\Models\Utility::langSetting();
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'vCardGo SaaS')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="vMycards" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicon -->

    <link rel="icon" href="<?php echo e($logo . '/favicon.png'); ?>" type="image/x-icon" />
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <!-- vendor css -->
    <?php if($setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>
    
    <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">


    <?php echo $__env->yieldPushContent('css-page'); ?>


    <style type="text/css">
            img.navbar-brand-img {
                width: 245px;
                height: 61px;
            } 
    </style>  

    <!-- Google Tag Manager --> 
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': 
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], 
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); 
      })(window,document,'script','dataLayer','GTM-5TX399K8');</script> 
      <!-- End Google Tag Manager -->  
      
</head> 

<body class="<?php echo e($color); ?>"> 
  <!-- Google Tag Manager (noscript) --> 
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TX399K8" 
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> 
    <!-- End Google Tag Manager (noscript) -->

<style>

.conatntwrap h2 {
    font-size: 20px;
}
.conatntwrap p {
    font-size: 16px;
    margin-bottom: 30px;
    line-height: 28px;
}
.pri p strong {
    font-size: 20px;
}

::marker {
    font-size: 22px;
    font-weight: bold;
}
.pri p{margin-bottom: 12px;}
.faqui li {
    margin-bottom: 41px;
}
</style>




<!-- Modal -->
<div class="modal fade" id="faq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><h3>FAQ's</h3></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <section class="tandcpage">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
<ol class="faqui">

<li>
    <h4>What Is A Digital Business Card?</h4>
    <p><b>Ans.-</b> It is a digital card for sending contact details electronically, replacing outdated visiting cards. It is a personalized, interactive digital card that simplifies networking for you. </p>
</li>

<li>
    <h4>What Is A vMyCards Business Card?
</h4>
    <p><b>Ans.-</b> It is designed for professionals who attend meetings, tradeshows, or seminars to quickly share their business details without the hassle of manual sharing.</p>
</li>
<li>
    <h4>Tell Us How vMyCards Works?
</h4>
    <p><b>Ans.-</b> You can start by taking a 30-day free trial that lets you create, design, and share the business information you want others to see with the help of powerful technologies like NFC.
</p>
</li>
<li>
    <h4>How Do I Share My Digital Business Card?
</h4>
    <p><b>Ans.-</b> Sharing your digital business card with vMyCards is simple; just tap your card on the back of a phone or access it through a QR code. But first, you need to sign up and create an account with us. 
</p>
</li>
<li>
    <h4> How Many Digital Business Cards Can I Create?
</h4>
    <p><b>Ans.-</b> With vMyCards, you can create as many digital business cards as you need to suit various networking and business situations. 
</p>
</li>
<li>
    <h4>Will My Digital Business Card Be Mobile Friendly?
</h4>
    <p><b>Ans.-</b> Yes, vMyCards ensures your digital business card is mobile-friendly, making it accessible and user-friendly on smartphones.</p>
</li>
<li>
    <h4> Does vMyCards Require A Subscription?
</h4>
    <p><b>Ans.-</b> vMyCards offers unparalleled deals on pricing at a mere 30 Rupees per month! If this isn't convincing enough, you get the card for free. </p>
</li>
</ul>


</div>
</div>
</div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="t-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><h3>Terms and Conditions</h3></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="tandcpage">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">

<div class="conatntwrap tc">

  <div>
              

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
    </div>
  </div>
</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="privacy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><h3>Privacy Policy</h3></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="tandcpage">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">

<div class="conatntwrap pri">

  <div>
   
    
      <p>
        <strong>Introduction:</strong>
      </p>
      <p>At vmycards.com, we are committed to protecting the privacy and security of our users' personal information. This Privacy Policy outlines how we collect, use, disclose, and protect your data when you interact with our website.</p>
      <p>
        <strong>Information We Collect:</strong>
      </p>
      <p>- Personal Information: We may collect personal information such as your name, email address, and contact details when you register an account, subscribe to our newsletter, or use our services.</p>
      <p>- Usage Information: We gather data on how you interact with our website, including your browsing activity, pages visited, and interactions with features.</p>
      <p>
        <strong>How We Use Your Information:</strong>
      </p>
      <p>- Provide Services: We use your information to deliver the services you requested, such as processing transactions and delivering products.</p>
      <p>- Communication: We may use your contact information to send you updates, promotions, and important notices.</p>
      <p>- Improving Services: Your data helps us understand user preferences and behaviors, allowing us to enhance our website and services.</p>
      <p>- Legal Requirements: We may share your information if required by law or to protect our rights, safety, and property.</p>
      <p>
        <strong>Cookies and Tracking:</strong>
      </p>
      <p>We use cookies and similar tracking technologies to improve your browsing experience, analyze site traffic, and personalize content. You can manage your cookie preferences through your browser settings.</p>
      <p>
        <strong>Third-Party Services:</strong>
      </p>
      <p>We may use third-party services, such as analytics and payment processors, to enhance our website's functionality. These third parties may have their own privacy policies.</p>
      <p>
        <strong>Data Security:</strong>
      </p>
      <p>We employ industry-standard security measures to safeguard your data from unauthorized access, disclosure, or misuse.</p>
      <p>
        <strong>Your Choices:</strong>
      </p>
      <p>- You can update your personal information by logging into your account.</p>
      <p>- You can opt-out of receiving marketing communications by following the unsubscribe instructions in our emails.</p>
      <p>- You can disable cookies through your browser settings.</p>
      <p>
        <strong>Children's Privacy:</strong>
      </p>
      <p>Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children.</p>
      <p>
        <strong>Changes to This Policy:</strong>
      </p>
      <p>We may update this Privacy Policy periodically to reflect changes in our practices. We encourage you to review the policy whenever you visit our website.</p>
      <p>
        <strong>Contact Us:</strong>
      </p>
      <p>If you have questions or concerns about our Privacy Policy, you can contact us at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a>. </p>
    
                </div>
</div>
      </div>
    </div>
  </div>
</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!----------------------->
    
    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <div class="auth-wrapper auth-v3">
                <div class="bg-auth-side bg-primary"></div>
                <div class="auth-content">
                    <nav class="navbar navbar-expand-md navbar-light default">
                        <div class="container-fluid pe-2">
                            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                                <?php if($setting['cust_darklayout'] == 'on'): ?>
                                    <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png').'?'.time()); ?>"
                                        alt="" class="img-fluid" />
                                <?php else: ?>
                                    <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png').'?'.time()); ?>"
                                        alt="" class="img-fluid" />
                                <?php endif; ?>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                                <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#"  data-bs-toggle="modal" data-bs-target="#faq">FAQ's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#t-c">T&C</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#privacy">Privacy</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <?php echo $__env->yieldContent('language-bar'); ?>
                                </ul>
                            </div>
                        </div>
                    </nav>


                    <!-- Button trigger modal -->






                    <?php echo $__env->yieldContent('content'); ?>
                    <div class="auth-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <p class="">
                                        <?php echo e(__('Copyright © ')); ?><?php echo e(isset($langSetting['footer_text']) ? $langSetting['footer_text'] : config('app.name', 'vCardGo-SaaS')); ?> <?php echo e(date('Y')); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>

    <!-- Required Js --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
         <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
            document.addEventListener('DOMContentLoaded', (event) => {
            const recaptcha = document.querySelector('.g-recaptcha');
            recaptcha.setAttribute("data-theme", "dark");
            });
        <?php endif; ?>
    </script>
    <script>
        feather.replace();
    </script>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>

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
<?php /**PATH /var/www/vmycards-2/resources/views/layouts/auth.blade.php ENDPATH**/ ?>