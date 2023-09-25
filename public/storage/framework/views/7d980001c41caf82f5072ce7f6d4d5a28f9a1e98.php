<?php
    $social_no = 1;
    $appointment_no = 0;
    $service_row_no = 0;
    $testimonials_row_no = 0;
    $gallery_row_no = 0;
    
    $no = 1;
    $stringid = $business->id;
    $is_enable = false;
    $is_contact_enable = false;
    $is_enable_appoinment = false;
    $is_enable_service = false;
    $is_enable_testimonials = false;
    $is_enable_sociallinks = false;
    $is_custom_html_enable = false;
    $is_enable_gallery = false;
    $custom_html = $business->custom_html_text;
    $is_branding_enabled = false;
    $branding = $business->branding_text;
    $is_gdpr_enabled = false;
    $gdpr_text = $business->gdpr_text;
    $card_theme = json_decode($business->card_theme);
    
    $banner = \App\Models\Utility::get_file('card_banner');
    $logo = \App\Models\Utility::get_file('card_logo');
    $image = \App\Models\Utility::get_file('testimonials_images');
    $s_image = \App\Models\Utility::get_file('service_images');
    
    $company_favicon = Utility::getsettingsbyid($business->created_by);
    $company_favicon = $company_favicon['company_favicon'];
    $logo1 = \App\Models\Utility::get_file('uploads/logo/');
    
    $meta_image = \App\Models\Utility::get_file('meta_image');
    $gallery_path = \App\Models\Utility::get_file('gallery');
    $qr_path = \App\Models\Utility::get_file('qrcode');
    
    if (!is_null($contactinfo) && !is_null($contactinfo)) {
        $contactinfo['is_enabled'] == '1' ? ($is_contact_enable = true) : ($is_contact_enable = false);
    }
    
    if (!is_null($business_hours) && !is_null($businesshours)) {
        $businesshours['is_enabled'] == '1' ? ($is_enable = true) : ($is_enable = false);
    }
    
    if (!is_null($appoinment_hours) && !is_null($appoinment)) {
        $appoinment['is_enabled'] == '1' ? ($is_enable_appoinment = true) : ($is_enable_appoinment = false);
    }
    
    if (!is_null($services_content) && !is_null($services)) {
        $services['is_enabled'] == '1' ? ($is_enable_service = true) : ($is_enable_service = false);
    }
    
    if (!is_null($testimonials_content) && !is_null($testimonials)) {
        $testimonials['is_enabled'] == '1' ? ($is_enable_testimonials = true) : ($is_enable_testimonials = false);
    }
    
    if (!is_null($social_content) && !is_null($sociallinks)) {
        $sociallinks['is_enabled'] == '1' ? ($is_enable_sociallinks = true) : ($is_enable_sociallinks = false);
    }
    
    if (!is_null($gallery_contents) && !is_null($gallery)) {
        $gallery['is_enabled'] == '1' ? ($is_enable_gallery = true) : ($is_enable_gallery = false);
    }
    
    if (!is_null($custom_html) && !is_null($customhtml)) {
        $customhtml->is_custom_html_enabled == '1' ? ($is_custom_html_enable = true) : ($is_custom_html_enable = false);
    }
    
    if (!is_null($business->is_branding_enabled) && !is_null($business->is_branding_enabled)) {
        !empty($business->is_branding_enabled) && $business->is_branding_enabled == 'on' ? ($is_branding_enabled = true) : ($is_branding_enabled = false);
    } else {
        $is_branding_enabled = false;
    }
    if (!is_null($business->is_gdpr_enabled) && !is_null($business->is_gdpr_enabled)) {
        !empty($business->is_gdpr_enabled) && $business->is_gdpr_enabled == 'on' ? ($is_gdpr_enabled = true) : ($is_gdpr_enabled = false);
    }
    
    $color = substr($business->theme_color, 0, 6);
    
    $SITE_RTL = Cookie::get('SITE_RTL');
    if ($SITE_RTL == '') {
        $SITE_RTL = 'off';
    }
    $SITE_RTL = Utility::settings()['SITE_RTL'];
    
    
    $url_link = env('APP_URL') . '/' . $business->slug;
    $meta_tag_image = $meta_image . '/' . $business->meta_image;
    
    // Cookie
    $cookie_data = App\Models\Business::card_cookie($business->slug);
    $a = $cookie_data;
?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="<?php echo e($business->title); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="HandheldFriendly" content="True">

    <title><?php echo e($business->title); ?></title>
    <meta name="author" content="<?php echo e($business->title); ?>">
    <meta name="keywords" content="<?php echo e($business->meta_keyword); ?>">
    <meta name="description" content="<?php echo e($business->meta_description); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e($url_link); ?>">
    <meta property="og:title" content="<?php echo e($business->title); ?>">
    <meta property="og:description" content="<?php echo e($business->meta_description); ?>">
    <meta property="og:image"
        content="<?php echo e(!empty($business->meta_image) ? $meta_tag_image : asset('custom/img/placeholder-image.jpg')); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e($url_link); ?>">
    <meta property="twitter:title" content="<?php echo e($business->title); ?>">
    <meta property="twitter:description" content="<?php echo e($business->meta_description); ?>">
    <meta property="twitter:image"
        content="<?php echo e(!empty($business->meta_image) ? $meta_tag_image : asset('custom/img/placeholder-image.jpg')); ?>">

    

    <link rel="icon"
        href="<?php echo e($logo1 . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png')); ?>"
        type="image" sizes="16x16">
    <link rel="stylesheet" href="<?php echo e(asset('custom/theme4/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/theme4/fonts/stylesheet.css')); ?>">
    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme4/css/rtl-main-style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme4/css/rtl-responsive.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme4/css/main-style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('custom/theme4/css/responsive.css')); ?>">
    <?php endif; ?>
    <?php if(isset($is_slug)): ?>
        <link rel='stylesheet' href='<?php echo e(asset('css/cookieconsent.css')); ?>' media="screen" />
        <style type="text/css">
            <?php echo e($business->customcss); ?>

        </style>
    <?php endif; ?>
    <?php if($business->google_fonts != 'Default' && isset($business->google_fonts)): ?>
        <style>
            @import url('<?php echo e(\App\Models\Utility::getvalueoffont($business->google_fonts)['link']); ?>');

            :root {
                --Strawford: '<?php echo e(strtok(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], ',')); ?>', <?php echo e(substr(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], strpos(\App\Models\Utility::getvalueoffont($business->google_fonts)['fontfamily'], ',') + 1)); ?>;
            }
        </style>
    <?php endif; ?>
    
    <meta name="mobile-wep-app-capable" content="yes">
    <meta name="apple-mobile-wep-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <link rel="apple-touch-icon"
        href="<?php echo e(asset(Storage::url('uploads/logo/') . (!empty($setting->value) ? $setting->value : 'favicon.png'))); ?>" />

    <?php if($business->enable_pwa_business == 'on' && $plan->pwa_business == 'on'): ?>
        <link rel="manifest"
            href="<?php echo e(asset('storage/uploads/theme_app/business_' . $business->id . '/manifest.json')); ?>" />
    <?php endif; ?>
    <?php if(!empty($business->pwa_business($business->slug)->theme_color)): ?>
        <meta name="theme-color" content="<?php echo e($business->pwa_business($business->slug)->theme_color); ?>" />
    <?php endif; ?>
    <?php if(!empty($business->pwa_business($business->slug)->background_color)): ?>
        <meta name="apple-mobile-web-app-status-bar"
            content="<?php echo e($business->pwa_business($business->slug)->background_color); ?>" />
    <?php endif; ?>

    <?php $__currentLoopData = $pixelScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?= $script ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</head>

<body class="tech-card-body">
    <div class="<?php echo e(\App\Models\Utility::themeOne()['theme4'][$business->theme_color]['theme_name']); ?>"
        id="view_theme14">
        <main id="boxes">
            <div class="card-wrapper">
                <div class="bussiness-card">
                    <div class="bussiness-card-body">
                        <section class="profile-section">
                            <div class="profile-cover">
                                <img src="<?php echo e(isset($business->banner) && !empty($business->banner) ? $banner . '/' . $business->banner : asset('custom/img/placeholder-image.jpg')); ?>"
                                    id="banner_preview" alt="fs">
                            </div>
                            <div class="profile-content">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img id="business_logo_preview"
                                            src="<?php echo e(isset($business->logo) && !empty($business->logo) ? $logo . '/' . $business->logo : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                            alt="">
                                    </div>
                                    <div class="user-name">
                                        <h3 id="<?php echo e($stringid . '_title'); ?>_preview"><?php echo e($business->title); ?></h3>
                                        <p id="<?php echo e($stringid . '_designation'); ?>_preview"><?php echo e($business->designation); ?></p>
                                        <span id="<?php echo e($stringid . '_subtitle'); ?>_preview"
                                            class="subtitle"><?php echo e($business->sub_title); ?></span>
                                    </div>
                                </div>
                                <div class="text-left desc-wrapper">
                                    <p id="<?php echo e($stringid . '_desc'); ?>_preview"><?php echo e($business->description); ?>

                                    </p>
                                </div>

                            </div>
                        </section>
                        <?php $j = 1; ?>
                        <?php $__currentLoopData = $card_theme->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_key => $order_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($j == $order_value): ?>
                                <?php if($order_key == 'gallery'): ?>
                                    <section class="gallery-section" id="gallery-div">
                                        <div class="section-title text-center">
                                            <h2><?php echo e(__('Gallery')); ?></h2>
                                        </div>
                                        <div id="inputrow_gallery_preview">
                                            <?php $image_count = 0; ?>
                                            <?php if(isset($is_pdf)): ?>
                                            <div class="gallery-cards">
                                                <div class="row">
                                                    <?php if(!is_null($gallery_contents) && !is_null($gallery)): ?>
                                                    <?php $__currentLoopData = $gallery_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($gallery_content->type)): ?>
                                                            <?php if($gallery_content->type == 'video'): ?>
                                                               
                                                            <?php elseif($gallery_content->type == 'image'): ?>
                                                            <div class="gallery-itm  col-12">
                                                                <div class="gallery-media">
                                                                    <a href="javascript:;" id="imagepopup"
                                                                        tabindex="0" class="imagepopup">
                                                                        <img src="<?php echo e(isset($gallery_content->value) && !empty($gallery_content->value) ? $gallery_path .'/'.$gallery_content->value : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                                            alt="images"
                                                                            class="imageresource">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <?php elseif($gallery_content->type == 'custom_video_link'): ?>
                                                               
                                                            <?php elseif($gallery_content->type == 'custom_image_link'): ?>
                                                               
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php
                                                            $image_count++;
                                                            $gallery_row_no++;
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                            <?php else: ?>
                                                <div class="gallery-slider">
                                                    <?php if(!is_null($gallery_contents) && !is_null($gallery)): ?>
                                                        <?php $__currentLoopData = $gallery_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="gallery-itm" id="gallery_<?php echo e($gallery_row_no); ?>">
                                                                <div class="gallery-media">
                                                                    <?php if(isset($gallery_content->type)): ?>
                                                                        <?php if($gallery_content->type == 'video'): ?>
                                                                            <a href="javascript:;" tabindex="0"
                                                                                class="videopop play-btn">
                                                                                
                                                                                <video loop autoplay controls="true">
                                                                                    <source class="videoresource"
                                                                                        src="<?php echo e(isset($gallery_content->value) && !empty($gallery_content->value) ? $gallery_path .'/'.$gallery_content->value : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                                                        type="video/mp4">
                                                                                </video>
                                                                            </a>
                                                                        <?php elseif($gallery_content->type == 'image'): ?>
                                                                            <a href="javascript:;" tabindex="0"
                                                                                class="imagepopup">
                                                                                
                                                                                <img src="<?php echo e(isset($gallery_content->value) && !empty($gallery_content->value) ? $gallery_path .'/'.$gallery_content->value : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                                                    alt="images" class="imageresource">
                                                                            </a>
                                                                        <?php elseif($gallery_content->type == 'custom_video_link'): ?>
                                                                            <a href="javascript:;" tabindex="0"
                                                                                class="videopop1 play-btn">
                                                                                
                                                                                <video loop autoplay controls="true">
                                                                                    <source class="videoresource1"
                                                                                        src="<?php echo e(isset($gallery_content->value) && !empty($gallery_content->value) ? $gallery_content->value : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                                                        type="video/mp4">
                                                                                </video>
                                                                            </a>
                                                                        <?php elseif($gallery_content->type == 'custom_image_link'): ?>
                                                                            <a href="javascript:;" tabindex="0"
                                                                                class="imagepopup1">
                                                                                
                                                                                <img class="imageresource1"
                                                                                    src="<?php echo e(isset($gallery_content->value) && !empty($gallery_content->value) ? $gallery_content->value : asset('custom/img/logo-placeholder-image-2.png')); ?>"
                                                                                    alt="images" id="upload_image">
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'service'): ?>
                                    <section class="service-section" id="services-div">
                                        <div class="section-title text-center">
                                            <h2> <?php echo e(__('Services')); ?></h2>
                                        </div>
                                        <?php if(isset($is_pdf)): ?>
                                            <div class="row" id="inputrow_service_preview">
                                                <?php $image_count = 0; ?>
                                                <?php $__currentLoopData = $services_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="service-card col-sm-6 col-12" id="services_<?php echo e($service_row_no); ?>">
                                                        <div class="service-card-inner">
                                                            <div class="service-icon">
                                                                <img id="<?php echo e('s_image' . $image_count . '_preview'); ?>"
                                                                    src="<?php echo e(isset($content->image) && !empty($content->image) ? $s_image . '/' . $content->image : asset('custom/img/logo-placeholder-image-21.png')); ?>"class="img-fluid"
                                                                    alt="image">
                                                            </div>
                                                            <h5 id="<?php echo e('title_' . $service_row_no . '_preview'); ?>">
                                                                <?php echo e($content->title); ?></h5>
                                                            <p id="<?php echo e('description_' . $service_row_no . '_preview'); ?>">
                                                                <?php echo e($content->description); ?>

                                                            </p>
                                                            <?php if(!empty($content->purchase_link)): ?>
                                                                <a href="<?php echo e(url($content->purchase_link)); ?>"
                                                                    class="btn"
                                                                    id="<?php echo e('link_title_' . $service_row_no . '_preview'); ?>"><?php echo e($content->link_title); ?>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                        height="22" viewBox="0 0 21 22"
                                                                        fill="none">
                                                                        <path opacity="0.4"
                                                                            d="M10.5 19.5731C15.1833 19.5731 18.9799 15.7765 18.9799 11.0932C18.9799 6.40986 15.1833 2.61328 10.5 2.61328C5.81672 2.61328 2.02014 6.40986 2.02014 11.0932C2.02014 15.7765 5.81672 19.5731 10.5 19.5731Z"
                                                                            fill="white"></path>
                                                                        <path
                                                                            d="M14.4787 10.8497C14.4464 10.7717 14.3999 10.7014 14.3414 10.6429L11.7974 8.09894C11.549 7.85048 11.1462 7.85048 10.8977 8.09894C10.6492 8.3474 10.6492 8.75023 10.8977 8.99869L12.3562 10.4572H7.10804C6.75697 10.4572 6.47205 10.7421 6.47205 11.0932C6.47205 11.4443 6.75697 11.7292 7.10804 11.7292H12.3562L10.8977 13.1877C10.6492 13.4362 10.6492 13.839 10.8977 14.0875C11.0215 14.2113 11.1843 14.274 11.3472 14.274C11.51 14.274 11.6728 14.2121 11.7966 14.0875L14.3406 11.5435C14.3991 11.485 14.4456 11.4147 14.4778 11.3367C14.5431 11.1806 14.5431 11.0058 14.4787 10.8497Z"
                                                                            fill="white"></path>
                                                                    </svg>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $image_count++;
                                                        $service_row_no++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php else: ?>
                                        <div class="service-slider" id="inputrow_service_preview">
                                            <?php $image_count = 0; ?>
                                            <?php $__currentLoopData = $services_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="service-card" id="services_<?php echo e($service_row_no); ?>">
                                                    <div class="service-card-inner">
                                                        <div class="service-icon">
                                                            <img id="<?php echo e('s_image' . $image_count . '_preview'); ?>"
                                                                src="<?php echo e(isset($content->image) && !empty($content->image) ? $s_image . '/' . $content->image : asset('custom/img/logo-placeholder-image-21.png')); ?>"class="img-fluid"
                                                                alt="image">
                                                        </div>
                                                        <h5 id="<?php echo e('title_' . $service_row_no . '_preview'); ?>">
                                                            <?php echo e($content->title); ?></h5>
                                                        <p id="<?php echo e('description_' . $service_row_no . '_preview'); ?>">
                                                            <?php echo e($content->description); ?>

                                                        </p>
                                                        <?php if(!empty($content->purchase_link)): ?>
                                                            <a href="<?php echo e(url($content->purchase_link)); ?>" class="btn"
                                                                id="<?php echo e('link_title_' . $service_row_no . '_preview'); ?>"><?php echo e($content->link_title); ?>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                    height="22" viewBox="0 0 21 22" fill="none">
                                                                    <path opacity="0.4"
                                                                        d="M10.5 19.5731C15.1833 19.5731 18.9799 15.7765 18.9799 11.0932C18.9799 6.40986 15.1833 2.61328 10.5 2.61328C5.81672 2.61328 2.02014 6.40986 2.02014 11.0932C2.02014 15.7765 5.81672 19.5731 10.5 19.5731Z"
                                                                        fill="white"></path>
                                                                    <path
                                                                        d="M14.4787 10.8497C14.4464 10.7717 14.3999 10.7014 14.3414 10.6429L11.7974 8.09894C11.549 7.85048 11.1462 7.85048 10.8977 8.09894C10.6492 8.3474 10.6492 8.75023 10.8977 8.99869L12.3562 10.4572H7.10804C6.75697 10.4572 6.47205 10.7421 6.47205 11.0932C6.47205 11.4443 6.75697 11.7292 7.10804 11.7292H12.3562L10.8977 13.1877C10.6492 13.4362 10.6492 13.839 10.8977 14.0875C11.0215 14.2113 11.1843 14.274 11.3472 14.274C11.51 14.274 11.6728 14.2121 11.7966 14.0875L14.3406 11.5435C14.3991 11.485 14.4456 11.4147 14.4778 11.3367C14.5431 11.1806 14.5431 11.0058 14.4787 10.8497Z"
                                                                        fill="white"></path>
                                                                </svg>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php
                                                    $image_count++;
                                                    $service_row_no++;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'bussiness_hour'): ?>
                                    <section class="bussiness-hour" id="business-hours-div">
                                        <div class="section-title">
                                            <h2><?php echo e(__('Business Hours')); ?></h2>
                                        </div>
                                        <ul class="hours-list text-center">
                                            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><b><?php echo e(__($day)); ?>:</b>
                                                    <span class="days_<?php echo e($k); ?>">
                                                        <?php if(isset($business_hours->$k) && $business_hours->$k->days == 'on'): ?>
                                                            <span
                                                                class="days_<?php echo e($k); ?>_start"><?php echo e(!empty($business_hours->$k->start_time) && isset($business_hours->$k->start_time) ? date('h:i A', strtotime($business_hours->$k->start_time)) : '00:00'); ?></span> - <span
                                                                class="days_<?php echo e($k); ?>_end"><?php echo e(!empty($business_hours->$k->end_time) && isset($business_hours->$k->end_time) ? date('h:i A', strtotime($business_hours->$k->end_time)) : '00:00'); ?></span>
                                                        <?php else: ?>
                                                            <?php echo e(__('Closed')); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'contact_info'): ?>
                                    <section class="contact-section" id="contact-div">
                                        <h2><?php echo e(__('Contact')); ?></h2>
                                        <ul id="inputrow_contact_preview">
                                            <?php if(!is_null($contactinfo_content) && !is_null($contactinfo)): ?>
                                                <?php $__currentLoopData = $contactinfo_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key1 == 'Phone'): ?>
                                                            <?php $href = 'tel:'.$val1; ?>
                                                        <?php elseif($key1 == 'Email'): ?>
                                                            <?php $href = 'mailto:'.$val1; ?>
                                                        <?php elseif($key1 == 'Address'): ?>
                                                            <?php $href = ''; ?>
                                                        <?php else: ?>
                                                            <?php $href = $val1 ?>
                                                        <?php endif; ?>
                                                        <?php if($key1 != 'id'): ?>
                                                            <li id="contact_<?php echo e($loop->parent->index + 1); ?>">
                                                                <?php if($key1 == 'Address'): ?>
                                                                    <?php $__currentLoopData = $val1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($key2 == 'Address_url'): ?>
                                                                            <?php $href = $val2; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <a href="<?php echo e($href); ?>">
                                                                        <span>
                                                                            <img src="<?php echo e(asset('custom/theme4/icon/' . $color . '/' . strtolower($key1) . '.svg')); ?>"
                                                                                class="img-fluid">
                                                                        </span>
                                                                        <?php $__currentLoopData = $val1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($key2 == 'Address'): ?>
                                                                                <span
                                                                                    id="<?php echo e($key1 . '_' . $no); ?>_preview">
                                                                                    <?php echo e($val2); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <?php if($key1 == 'Whatsapp'): ?>
                                                                        <a href="<?php echo e(url('https://wa.me/' . $href)); ?>"
                                                                            target="_blank">
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e($href); ?>">
                                                                    <?php endif; ?>
                                                                    <span>
                                                                        <img src="<?php echo e(asset('custom/theme4/icon/' . $color . '/' . strtolower($key1) . '.svg')); ?>"
                                                                            class="img-fluid">
                                                                    </span>
                                                                    <span id="<?php echo e($key1 . '_' . $no); ?>_preview">
                                                                        <?php echo e($val1); ?></span>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php
                                                            $no++;
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'appointment'): ?>
                                    <section class="make-appointment" id="appointment-div">
                                        <div class="section-title text-center">
                                            <h2><?php echo e(__('Make')); ?> <br><?php echo e(__('an appointment')); ?> </h2>
                                        </div>
                                        <div class="appointment-form">
                                            <div class="form-group">
                                                <label><?php echo e(__('Date:')); ?></label>
                                                <input type="text" name="date" class="datepicker_min"
                                                    placeholder="<?php echo e(__('Pick a Date')); ?>">
                                                <span class="text-danger text-center h6 span-error-date"></span>
                                            </div>

                                            <div class="form-group">
                                                <label class="primary-text"><?php echo e(__('Hour:')); ?></label>
                                                <div class="cust-checkbox">
                                                    <div class="row row-gap" id="inputrow_appointment_preview">
                                                        <?php $radiocount = 1; ?>
                                                        <?php if(!is_null($appoinment_hours)): ?>
                                                            <?php $__currentLoopData = $appoinment_hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-sm-6 col-12"
                                                                    id="<?php echo e('appointment_' . $appointment_no); ?>">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="app_time"
                                                                            id="radio-<?php echo e($radiocount); ?>"
                                                                            data-id="<?php if(!empty($hour->start)): ?> <?php echo e($hour->start); ?> <?php else: ?> 00:00 <?php endif; ?>-<?php if(!empty($hour->end)): ?> <?php echo e($hour->end); ?> <?php else: ?> 00:00 <?php endif; ?>"
                                                                            name="time">
                                                                        <label for="radio-<?php echo e($radiocount); ?>"><span
                                                                                id="appoinment_start_<?php echo e($appointment_no); ?>_preview">
                                                                                <?php if(!empty($hour->start)): ?>
                                                                                    <?php echo e($hour->start); ?>

                                                                                <?php else: ?>
                                                                                    00:00
                                                                                <?php endif; ?>
                                                                            </span> - <span
                                                                                id="appoinment_end_<?php echo e($appointment_no); ?>_preview">
                                                                                <?php if(!empty($hour->end)): ?>
                                                                                    <?php echo e($hour->end); ?>

                                                                                <?php else: ?>
                                                                                    00:00
                                                                                <?php endif; ?>
                                                                            </span></label>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    $radiocount++;
                                                                    $appointment_no++;
                                                                ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <span class="text-danger text-center h6 span-error-time"></span>
                                            </div>

                                            <div class="text-center">
                                                <button
                                                    class="btn hover-secondary appointment-modal-toggle"><?php echo e(__('Make an appointment')); ?></button>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'testimonials'): ?>
                                    <section class="testimonial-section text-center" id="testimonials-div">
                                        <div class="section-title">
                                            <h2><?php echo e(__('Testimonials')); ?></h2>
                                        </div>
                                        <?php if(isset($is_pdf)): ?>
                                        <div class="row gap-bottom" id="inputrow_testimonials_preview">
                                            <?php
                                                $t_image_count = 0;
                                                $rating = 0;
                                            ?>
                                            <?php $__currentLoopData = $testimonials_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $testi_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="testimonial-card col-sm-6"
                                                    id="testimonials_<?php echo e($testimonials_row_no); ?>">
                                                    <div class="testimonial-card-inner">
                                                        <div class="user-pro">
                                                            <div class="user-avatar">
                                                                <img id="<?php echo e('t_image' . $t_image_count . '_preview'); ?>"
                                                                    src="<?php echo e(isset($testi_content->image) && !empty($testi_content->image) ? $image . '/' . $testi_content->image : asset('custom/img/placeholder-image12.jpg')); ?>"
                                                                    alt="image">
                                                            </div>
                                                            <span
                                                                class="total-rat"><?php echo e($testi_content->rating); ?>/5</span>
                                                            <?php
                                                                if (!empty($testi_content->rating)) {
                                                                    $rating = (int) $testi_content->rating;
                                                                    $overallrating = $rating;
                                                                } else {
                                                                    $overallrating = 0;
                                                                }
                                                            ?>
                                                            <br>
                                                            <span id="<?php echo e('stars' . $testimonials_row_no); ?>_star"
                                                                class="stars">
                                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if($overallrating < $i): ?>
                                                                        <?php if(is_float($overallrating) && round($overallrating) == $i): ?>
                                                                            <i
                                                                                class="star-color fas fa-star-half-alt"></i>
                                                                        <?php else: ?>
                                                                            <i class="fa fa-star"></i>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <i class="star-color fas fa-star"></i>
                                                                    <?php endif; ?>
                                                                <?php endfor; ?>
                                                            </span>
                                                           
                                                        </div>
                                                        <p
                                                            id="<?php echo e('testimonial_description_' . $testimonials_row_no . '_preview'); ?>">
                                                            <?php echo e($testi_content->description); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <?php
                                                    $t_image_count++;
                                                    $testimonials_row_no++;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php else: ?>
                                            <div class="testimonial-slider" id="inputrow_testimonials_preview">
                                                <?php
                                                    $t_image_count = 0;
                                                    $rating = 0;
                                                ?>
                                                <?php $__currentLoopData = $testimonials_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $testi_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="testimonial-card">
                                                        <div class="testimonial-card-inner">
                                                            <div class="user-pro">
                                                                <div class="user-avatar">
                                                                    <img id="<?php echo e('t_image' . $t_image_count . '_preview'); ?>"
                                                                        src="<?php echo e(isset($testi_content->image) && !empty($testi_content->image) ? $image . '/' . $testi_content->image : asset('custom/img/placeholder-image12.jpg')); ?>"
                                                                        alt="image">
                                                                </div>
                                                                <span
                                                                    class="total-rat"><?php echo e($testi_content->rating); ?>/5</span><br>
                                                                <?php
                                                                    if (!empty($testi_content->rating)) {
                                                                        $rating = (int) $testi_content->rating;
                                                                        $overallrating = $rating;
                                                                    } else {
                                                                        $overallrating = 0;
                                                                    }
                                                                ?>
                                                                <span id="<?php echo e('stars' . $testimonials_row_no); ?>_star"
                                                                    class="stars">
                                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if($overallrating < $i): ?>
                                                                            <?php if(is_float($overallrating) && round($overallrating) == $i): ?>
                                                                                <i
                                                                                    class="star-color fas fa-star-half-alt"></i>
                                                                            <?php else: ?>
                                                                                <i class="fa fa-star"></i>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <i class="star-color fas fa-star"></i>
                                                                        <?php endif; ?>
                                                                    <?php endfor; ?>
                                                                </span>
                                                            </div>
                                                            <p
                                                                id="<?php echo e('testimonial_description_' . $testimonials_row_no . '_preview'); ?>">
                                                                <?php echo e($testi_content->description); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $t_image_count++;
                                                        $testimonials_row_no++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'social'): ?>
                                    <section class="social" id="social-div">
                                        <div class="section-title text-center">
                                            <h2><?php echo e(__('Social')); ?></h2>
                                        </div>
                                        <ul class="social-list" id="inputrow_socials_preview">
                                            <?php if(!is_null($social_content) && !is_null($sociallinks)): ?>
                                                <?php $__currentLoopData = $social_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key => $social_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $social_val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key1 => $social_val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($social_key1 != 'id'): ?>
                                                            <li id="socials_<?php echo e($loop->parent->index + 1); ?>">
                                                                <?php if($social_key1 == 'Whatsapp'): ?>
                                                                    <?php if((new \Jenssegers\Agent\Agent())->isDesktop()): ?>
                                                                        <?php
                                                                            $social_links = url('https://web.whatsapp.com/send?phone=' . $social_val1);
                                                                        ?>
                                                                    <?php else: ?>
                                                                        <?php
                                                                            $social_links = url('https://wa.me/' . $social_val1);
                                                                        ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php
                                                                        $social_links = url($social_val1);
                                                                    ?>
                                                                <?php endif; ?>
                                                                <a href="<?php echo e($social_links); ?>" target="_blank"
                                                                    id="<?php echo e('social_link_' . $social_no . '_href_preview'); ?>">
                                                                    <img src="<?php echo e(asset('custom/theme4/icon/social/' . strtolower($social_key1) . '.svg')); ?>"
                                                                        alt="social" class="img-fluid">
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php
                                                            $social_no++;
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </section>
                                <?php endif; ?>
                                <?php if($order_key == 'more'): ?>
                                    <section class="more-info">
                                        <div class="section-title text-center">
                                            <h2><?php echo e(__('More')); ?></h2>
                                        </div>
                                        <ul class="btn-list">
                                            <li>
                                                <a href="<?php echo e(route('bussiness.save', $business->slug)); ?>"
                                                    class="btn"><?php echo e(__('Save Card')); ?> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="33" height="32"
                                                        viewBox="0 0 33 32" fill="none">
                                                        <path opacity="0.4"
                                                            d="M8.5 13.3333C5.83333 13.3333 4.5 14.6666 4.5 17.3333V23.9999C4.5 26.6666 5.83333 27.9999 8.5 27.9999H24.5C27.1667 27.9999 28.5 26.6666 28.5 23.9999V17.3333C28.5 14.6666 27.1667 13.3333 24.5 13.3333H8.5Z"
                                                            fill="#242424"></path>
                                                        <path
                                                            d="M21.2067 16.6266C20.816 16.236 20.1826 16.236 19.792 16.6266L17.4987 18.92V4C17.4987 3.448 17.0507 3 16.4987 3C15.9467 3 15.4987 3.448 15.4987 4V18.9187L13.2054 16.6253C12.8147 16.2347 12.1813 16.2347 11.7907 16.6253C11.4 17.016 11.4 17.6494 11.7907 18.04L15.7907 22.04C15.8827 22.132 15.9932 22.2054 16.1159 22.256C16.2385 22.3067 16.368 22.3333 16.4987 22.3333C16.6294 22.3333 16.7585 22.3067 16.8812 22.256C17.0038 22.2054 17.1147 22.132 17.2067 22.04L21.2067 18.04C21.5974 17.6507 21.5974 17.016 21.2067 16.6266Z"
                                                            fill="#242424"></path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="btn share-modal-toggle"><?php echo e(__('Share Card')); ?>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32"
                                                        viewBox="0 0 33 32" fill="none">
                                                        <path opacity="0.4"
                                                            d="M10.972 15.0919C10.6054 15.0919 10.2519 14.8893 10.0759 14.5386C9.82788 14.0439 10.0295 13.444 10.5241 13.1973L21.0508 7.9346C21.5455 7.6866 22.144 7.88929 22.392 8.38129C22.64 8.87596 22.4387 9.47594 21.944 9.7226L11.4173 14.9853C11.2733 15.0573 11.1214 15.0919 10.972 15.0919Z"
                                                            fill="#242424"></path>
                                                        <path opacity="0.4"
                                                            d="M22.2335 24.5413C22.0841 24.5413 21.9308 24.5066 21.7881 24.436L9.78684 18.436C9.29217 18.1893 9.09193 17.588 9.3386 17.0947C9.58793 16.6027 10.1867 16.4 10.6801 16.648L22.6814 22.648C23.176 22.8946 23.376 23.496 23.1293 23.9893C22.9533 24.3373 22.6001 24.5413 22.2335 24.5413Z"
                                                            fill="#242424"></path>
                                                        <path
                                                            d="M8.5 20C10.7091 20 12.5 18.2091 12.5 16C12.5 13.7909 10.7091 12 8.5 12C6.29086 12 4.5 13.7909 4.5 16C4.5 18.2091 6.29086 20 8.5 20Z"
                                                            fill="#242424"></path>
                                                        <path
                                                            d="M24.5 12C26.7091 12 28.5 10.2091 28.5 8C28.5 5.79086 26.7091 4 24.5 4C22.2909 4 20.5 5.79086 20.5 8C20.5 10.2091 22.2909 12 24.5 12Z"
                                                            fill="#242424"></path>
                                                        <path
                                                            d="M24.5 28C26.7091 28 28.5 26.2091 28.5 24C28.5 21.7909 26.7091 20 24.5 20C22.2909 20 20.5 21.7909 20.5 24C20.5 26.2091 22.2909 28 24.5 28Z"
                                                            fill="#242424"></path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="btn make-contact-modal-toggle"><?php echo e(__('Contact')); ?>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32"
                                                        viewBox="0 0 33 32" fill="none">
                                                        <path opacity="0.4"
                                                            d="M20.3251 19.7253L18.8384 21.9453C15.1051 20.3853 12.1185 17.3867 10.5572 13.644L12.772 12.1706C13.9827 11.3653 14.3519 9.75333 13.6106 8.50133L11.5266 4.98265C11.0932 4.25065 10.2453 3.87332 9.41068 4.03998L9.3879 4.04397C5.97456 4.72664 3.79042 8.15733 4.71309 11.5133C6.89442 19.4493 13.0799 25.616 20.9986 27.7893C24.3546 28.7107 27.7798 26.524 28.4624 23.112C28.6291 22.28 28.2533 21.4347 27.5253 21L24.0012 18.8987C22.7492 18.1533 21.1357 18.516 20.3251 19.7253Z"
                                                            fill="#242424"></path>
                                                        <path
                                                            d="M23.1666 14.3333C22.6146 14.3333 22.1666 13.8853 22.1666 13.3333C22.1666 11.6786 20.82 10.3333 19.1666 10.3333C18.6146 10.3333 18.1666 9.88525 18.1666 9.33325C18.1666 8.78125 18.6146 8.33325 19.1666 8.33325C21.9226 8.33325 24.1666 10.5759 24.1666 13.3333C24.1666 13.8853 23.7186 14.3333 23.1666 14.3333ZM28.1666 13.3333C28.1666 8.37059 24.1293 4.33325 19.1666 4.33325C18.6146 4.33325 18.1666 4.78125 18.1666 5.33325C18.1666 5.88525 18.6146 6.33325 19.1666 6.33325C23.0266 6.33325 26.1666 9.47325 26.1666 13.3333C26.1666 13.8853 26.6146 14.3333 27.1666 14.3333C27.7186 14.3333 28.1666 13.8853 28.1666 13.3333Z"
                                                            fill="#242424"></path>
                                                    </svg></a>
                                            </li>
                                        </ul>
                                    </section>
                                <?php endif; ?>

                                <?php if($order_key == 'custom_html'): ?>
                                    <section class="card-footer custom_html_text">
                                        <div class="greetings-desk">
                                            <div class="user-text-avatar "
                                                id="<?php echo e($stringid . '_chtml'); ?>_preview">
                                                <?php echo stripslashes($custom_html); ?>

                                            </div>
                                        </div>

                                    </section>
                                <?php endif; ?>

                                <?php $j = $j + 1; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($plan->enable_branding == 'on'): ?>
                            <?php if($is_branding_enabled): ?>
                                <div class="copy-right is_branding_enable" id="is_branding_enabled">
                                    <p id="<?php echo e($stringid . '_branding'); ?>_preview"><?php echo e($business->branding_text); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <img src="<?php echo e(isset($qr_detail->image) ? $qr_path.'/'. $qr_detail->image : ''); ?>"
                id="image-buffers" style="display: none">
        </main>
        <div id="previewImage"> </div>
        <a id="download" href="#" class="font-lg download mr-3 text-white">
            <i class="fas fa-download"></i>
        </a>
        <!-- Share card popup -->
        <div class="theme-modal share-card">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close share-modal-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"
                                fill="none">
                                <path opacity="0.4"
                                    d="M37.2376 24.5509H7.76834C6.74981 24.5509 5.92651 23.7258 5.92651 22.7091C5.92651 21.6924 6.74981 20.8672 7.76834 20.8672H37.2376C38.2561 20.8672 39.0794 21.6924 39.0794 22.7091C39.0794 23.7258 38.2561 24.5509 37.2376 24.5509Z"
                                    fill="#F9D254" />
                                <path
                                    d="M15.1357 31.9183C14.6642 31.9183 14.1926 31.7378 13.8335 31.3787L6.46614 24.0114C5.74599 23.2912 5.74599 22.1271 6.46614 21.4069L13.8335 14.0396C14.5536 13.3194 15.7178 13.3194 16.4379 14.0396C17.1581 14.7598 17.1581 15.9239 16.4379 16.6441L10.3728 22.7091L16.4379 28.7742C17.1581 29.4944 17.1581 30.6585 16.4379 31.3787C16.0788 31.7378 15.6072 31.9183 15.1357 31.9183Z"
                                    fill="#F9D254" />
                            </svg>
                        </button>
                        <h5 class="modal-title"><?php echo e(__('Share This Card')); ?></h5>
                    </div>
                    <div class="modal-body">
                        <div class="qrcode-wrapper">
                            <div class="shareqrcode"></div>
                        </div>
                        <p><?php echo e(__('Point your camera at the QR code,')); ?> <br> <span class="qr-link text-wrap"></span></p>
                       
                        <p><?php echo e(__('Or check my social channels')); ?></p>
                        <ul class="social-list modal-share"> 
                            <?php if(!is_null($social_content) && !is_null($sociallinks)): ?>
                                <?php $__currentLoopData = $social_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key => $social_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $social_val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_key1 => $social_val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($social_key1 != 'id'): ?>
                                            <li id="socials_<?php echo e($loop->parent->index + 1); ?>"
                                                class="">
                                                <?php if($social_key1 == 'Whatsapp'): ?>
                                                    <?php if((new \Jenssegers\Agent\Agent())->isDesktop()): ?>
                                                        <?php
                                                            $social_links = url('https://web.whatsapp.com/send?phone=' . $social_val1);
                                                        ?>
                                                    <?php else: ?>
                                                        <?php
                                                            $social_links = url('https://wa.me/' . $social_val1);
                                                        ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php
                                                        $social_links = url($social_val1);
                                                    ?>
                                                <?php endif; ?>
                                                <a href="<?php echo e($social_links); ?>" target="_blank"
                                                    id="<?php echo e('social_link_' . $social_no . '_href_preview'); ?>">
                                                    <img src="<?php echo e(asset('custom/theme1/icon/social/' . strtolower($social_key1) . '.svg')); ?>"
                                                        alt="social" class="img-fluid">
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php
                                            $social_no++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- appointment popup -->
        <div class="theme-modal appointment-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close close-search1 appointment-modal-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"
                                fill="none">
                                <path opacity="0.4"
                                    d="M37.2376 24.5509H7.76834C6.74981 24.5509 5.92651 23.7258 5.92651 22.7091C5.92651 21.6924 6.74981 20.8672 7.76834 20.8672H37.2376C38.2561 20.8672 39.0794 21.6924 39.0794 22.7091C39.0794 23.7258 38.2561 24.5509 37.2376 24.5509Z"
                                    fill="#F9D254" />
                                <path
                                    d="M15.1357 31.9183C14.6642 31.9183 14.1926 31.7378 13.8335 31.3787L6.46614 24.0114C5.74599 23.2912 5.74599 22.1271 6.46614 21.4069L13.8335 14.0396C14.5536 13.3194 15.7178 13.3194 16.4379 14.0396C17.1581 14.7598 17.1581 15.9239 16.4379 16.6441L10.3728 22.7091L16.4379 28.7742C17.1581 29.4944 17.1581 30.6585 16.4379 31.3787C16.0788 31.7378 15.6072 31.9183 15.1357 31.9183Z"
                                    fill="#F9D254" />
                            </svg>
                        </button>
                        <h5 class="modal-title"><?php echo e(__('Make Appointment')); ?></h5>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo e(__('Name:')); ?></label>
                                <input type="text" name="name" class="app_name"
                                    placeholder="<?php echo e(__('Enter your name')); ?>">
                                <span class="text-danger  h6 span-error-name"></span>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Email:')); ?></label>
                                <input type="email" name="email" class="app_email"
                                    placeholder="<?php echo e(__('Enter your email')); ?>">
                                <span class="text-danger  h6 span-error-email"></span>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Phone:')); ?></label>
                                <input type="tel" name="phone" class="app_phone"
                                    placeholder="<?php echo e(__('Enter your phone no')); ?>">
                                <span class="text-danger  h6 span-error-phone"></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn-secondary appointment-modal-toggle"
                                type="button"><?php echo e(__('Close')); ?></button>
                            <button class="btn-secondary" id="makeappointment"
                                type="button"><?php echo e(__('Make Appointment')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Make Contact Popup -->
        <div class="theme-modal contact-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close make-contact-modal-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"
                                fill="none">
                                <path opacity="0.4"
                                    d="M37.2376 24.5509H7.76834C6.74981 24.5509 5.92651 23.7258 5.92651 22.7091C5.92651 21.6924 6.74981 20.8672 7.76834 20.8672H37.2376C38.2561 20.8672 39.0794 21.6924 39.0794 22.7091C39.0794 23.7258 38.2561 24.5509 37.2376 24.5509Z"
                                    fill="#F9D254" />
                                <path
                                    d="M15.1357 31.9183C14.6642 31.9183 14.1926 31.7378 13.8335 31.3787L6.46614 24.0114C5.74599 23.2912 5.74599 22.1271 6.46614 21.4069L13.8335 14.0396C14.5536 13.3194 15.7178 13.3194 16.4379 14.0396C17.1581 14.7598 17.1581 15.9239 16.4379 16.6441L10.3728 22.7091L16.4379 28.7742C17.1581 29.4944 17.1581 30.6585 16.4379 31.3787C16.0788 31.7378 15.6072 31.9183 15.1357 31.9183Z"
                                    fill="#F9D254" />
                            </svg>
                        </button>
                        <h5 class="modal-title"><?php echo e(__('Make Contact')); ?></h5>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo e(__('Name:')); ?></label>
                                <input type="text" name="name" class="contact_name"
                                    placeholder="<?php echo e(__('Enter your name')); ?>">
                                <span class="text-danger  h6 span-error-contactname"></span>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Email:')); ?></label>
                                <input type="email" name="email" class="contact_email"
                                    placeholder="<?php echo e(__('Enter your email')); ?>">
                                <span class="text-danger  h6 span-error-contactemail"></span>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Phone:')); ?></label>
                                <input type="tel" name="phone" class="contact_phone"
                                    placeholder="<?php echo e(__('Enter your phone no')); ?>">
                                <span class="text-danger  h6 span-error-contactphone"></span>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Message:')); ?></label>
                                <textarea name="message" class="contact_message" cols="30" rows="5"></textarea>
                                <span class="text-danger  h6 span-error-contactmessage"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn-secondary make-contact-modal-toggle"
                                type="button"><?php echo e(__('Close')); ?></button>
                            <button class="btn-secondary" id="makecontact"
                                type="button"><?php echo e(__('Make Contact')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="theme-modal" id="passwordmodel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title"><?php echo e(__('Password')); ?></h5>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo e(__('Password:')); ?></label>
                                <input type="password" name="Password" class="password_val"
                                    placeholder="<?php echo e(__('Enter password')); ?>">
                                <span class="text-danger h6 span-error-password"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn-secondary password-submit" type="button"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div class="theme-modal" id="gallerymodel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close close-model">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"
                                fill="none">
                                <path opacity="0.4"
                                    d="M37.2376 24.5509H7.76834C6.74981 24.5509 5.92651 23.7258 5.92651 22.7091C5.92651 21.6924 6.74981 20.8672 7.76834 20.8672H37.2376C38.2561 20.8672 39.0794 21.6924 39.0794 22.7091C39.0794 23.7258 38.2561 24.5509 37.2376 24.5509Z"
                                    fill="#F9D254" />
                                <path
                                    d="M15.1357 31.9183C14.6642 31.9183 14.1926 31.7378 13.8335 31.3787L6.46614 24.0114C5.74599 23.2912 5.74599 22.1271 6.46614 21.4069L13.8335 14.0396C14.5536 13.3194 15.7178 13.3194 16.4379 14.0396C17.1581 14.7598 17.1581 15.9239 16.4379 16.6441L10.3728 22.7091L16.4379 28.7742C17.1581 29.4944 17.1581 30.6585 16.4379 31.3787C16.0788 31.7378 15.6072 31.9183 15.1357 31.9183Z"
                                    fill="#F9D254" />
                            </svg>
                        </button>
                        <h5 class="modal-title"><?php echo e(__('Gallary')); ?></h5>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo e(__('Image preview:')); ?></label>
                                <img src="" class="imagepreview" style="width: 500px; height: 300px;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn-secondary close-model" type="button"><?php echo e(__('Close')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div class="theme-modal" id="videomodel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close close-model1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"
                                fill="none">
                                <path opacity="0.4"
                                    d="M37.2376 24.5509H7.76834C6.74981 24.5509 5.92651 23.7258 5.92651 22.7091C5.92651 21.6924 6.74981 20.8672 7.76834 20.8672H37.2376C38.2561 20.8672 39.0794 21.6924 39.0794 22.7091C39.0794 23.7258 38.2561 24.5509 37.2376 24.5509Z"
                                    fill="#F9D254" />
                                <path
                                    d="M15.1357 31.9183C14.6642 31.9183 14.1926 31.7378 13.8335 31.3787L6.46614 24.0114C5.74599 23.2912 5.74599 22.1271 6.46614 21.4069L13.8335 14.0396C14.5536 13.3194 15.7178 13.3194 16.4379 14.0396C17.1581 14.7598 17.1581 15.9239 16.4379 16.6441L10.3728 22.7091L16.4379 28.7742C17.1581 29.4944 17.1581 30.6585 16.4379 31.3787C16.0788 31.7378 15.6072 31.9183 15.1357 31.9183Z"
                                    fill="#F9D254" />
                            </svg>
                        </button>
                        <h5 class="modal-title"><?php echo e(__('Gallary')); ?></h5>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo e(__('Video preview:')); ?></label>
                                <iframe width="100%" height="360" class="videopreview" src=""
                                    frameborder="0" allowfullscreen autoplay></iframe>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn-secondary close-model1" type="button"><?php echo e(__('Close')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
    <script src="<?php echo e(asset('custom/theme4/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/theme4/js/slick.min.js')); ?>" defer="defer"></script>
    <?php if($SITE_RTL == 'on'): ?>
        <script src="<?php echo e(asset('custom/theme4/js/rtl-custom.js')); ?>" defer="defer"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('custom/theme4/js/custom.js')); ?>" defer="defer"></script>
    <?php endif; ?>
    <?php if(isset($plan->enable_qr_code) && $plan->enable_qr_code == 'on'): ?>
        <script src="<?php echo e(asset('custom/js/jquery.qrcode.min.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('custom/js/jquery.qrcode.js')); ?>"></script>
        <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
    <?php endif; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js"></script>
    <script src="<?php echo e(asset('custom/js/emojionearea.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/socialSharing.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/socialSharing.min.js')); ?>"></script>
    <?php if($business->enable_pwa_business == 'on' && $plan->pwa_business == 'on'): ?>
        <script type="text/javascript">
            const container = document.querySelector("body")

            const coffees = [];

            if ("serviceWorker" in navigator) {
                window.addEventListener("load", function() {
                    navigator.serviceWorker
                        .register("<?php echo e(asset('serviceWorker.js')); ?>")
                        .then(res => console.log("service worker registered"))
                        .catch(err => console.log("service worker not registered", err))

                })
            }
        </script>
    <?php endif; ?>
    <script>
        $(".imagepopup").on("click", function(e) {
            var imgsrc = $(this).children(".imageresource").attr("src");
            $('.imagepreview').attr('src',
                imgsrc); // here asign the image to the modal when the user click the enlarge link
            $("#gallerymodel").addClass("active");
            $("body").toggleClass("no-scroll");
            $('html').addClass('modal-open');
            $('#gallerymodel').css("background", 'rgb(0 0 0 / 50%)')
        });

        $(".imagepopup1").on("click", function() {
            var imgsrc1 = $(this).children(".imageresource1").attr("src");
            $('.imagepreview').attr('src',
                imgsrc1); // here asign the image to the modal when the user click the enlarge link
            $("#gallerymodel").addClass("active");
            $("body").toggleClass("no-scroll");
            $('html').addClass('modal-open');
            $('#gallerymodel').css("background", 'rgb(0 0 0 / 50%)')
        });

        $(".videopop").on("click", function() {
            var videosrc = $(this).children('video').children(".videoresource").attr("src");
            $('.videopreview').attr('src',
                videosrc); // here asign the image to the modal when the user click the enlarge link
            $("#videomodel").addClass("active");
            $("body").toggleClass("no-scroll");
            $('html').addClass('modal-open');
            $('#videomodel').css("background",
                'rgb(0 0 0 / 50%)'
            ) // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        });

        $(".videopop1").on("click", function() {
            var videosrc1 = $(this).children('video').children(".videoresource1").attr("src");
            $('.videopreview').attr('src',
                videosrc1); // here asign the image to the modal when the user click the enlarge link
            $("#videomodel").addClass("active");
            $("body").toggleClass("no-scroll");
            $('html').addClass('modal-open');
            $('#videomodel').css("background",
                'rgb(0 0 0 / 50%)'
            ) // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        });

        $(".close-model").on("click", function() {
            $("#gallerymodel").removeClass("active");
            $("body").removeClass("no-scroll");
            $('html').removeClass('modal-open');
            $('#gallerymodel').css("background", '')
        });

        $(".close-model1").on("click", function() {
            $("#videomodel").removeClass("active");
            $("body").removeClass("no-scroll");
            $('html').removeClass('modal-open');
            $('#videomodel').css("background", '')
        });


        $(document).ready(function() {

            var date = new Date();
            $('.datepicker_min').pickadate({
                min: date,
            })

        });
        //Password Check
        <?php if(!Auth::check()): ?>

            let ispassword;
            var ispassenable = '<?php echo e($business->enable_password); ?>';
            var business_password = '<?php echo e($business->password); ?>';

            if (ispassenable == 'on') {
                $('.password-submit').click(function() {

                    ispassword = 'true';
                    passwordpopup('true');
                });

                function passwordpopup(type) {
                    if (type == 'false') {

                        $("#passwordmodel").addClass("active");
                        $("body").toggleClass("no-scroll");
                        $('html').addClass('modal-open');
                        $('#passwordmodel').css("background", 'rgb(0 0 0 / 50%)')
                    } else {

                        var password_val = $('.password_val').val();

                        if (password_val == business_password) {
                            $("#passwordmodel").removeClass("active");
                            $("body").removeClass("no-scroll");
                            $('html').removeClass('modal-open');
                            $('#passwordmodel').css("background", '')
                        } else {

                            $(`.span-error-password`).text("<?php echo e(__('*Please enter correct password')); ?>");
                            passwordpopup('false');

                        }
                    }
                }

                if (ispassword == undefined) {
                    passwordpopup('false');
                }
            }
        <?php endif; ?>


        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            R
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        };


        $(document).ready(function() {
            $(".emojiarea").emojioneArea();
            $(`.span-error-date`).text("");
            $(`.span-error-time`).text("");
            $(`.span-error-name`).text("");
            $(`.span-error-email`).text("");
            $(`.span-error-contactname`).text("");
            $(`.span-error-contactemail`).text("");
            $(`.span-error-contactphone`).text("");
            $(`.span-error-contactmessage`).text("");


            var slug = '<?php echo e($business->slug); ?>';
            var url_link = `<?php echo e(url('/')); ?>/${slug}`;
            $(`.qr-link`).text(url_link);
            <?php if(isset($plan->enable_qr_code) && $plan->enable_qr_code == 'on'): ?>
                var foreground_color =
                    `<?php echo e(isset($qr_detail->foreground_color) ? $qr_detail->foreground_color : '#000000'); ?>`;
                var background_color =
                    `<?php echo e(isset($qr_detail->background_color) ? $qr_detail->background_color : '#ffffff'); ?>`;
                var radius = `<?php echo e(isset($qr_detail->radius) ? $qr_detail->radius : 26); ?>`;
                var qr_type = `<?php echo e(isset($qr_detail->qr_type) ? $qr_detail->qr_type : 0); ?>`;
                var qr_font = `<?php echo e(isset($qr_detail->qr_text) ? $qr_detail->qr_text : 'vCard'); ?>`;
                var qr_font_color =
                    `<?php echo e(isset($qr_detail->qr_text_color) ? $qr_detail->qr_text_color : '#f50a0a'); ?>`;
                var size = `<?php echo e(isset($qr_detail->size) ? $qr_detail->size : 9); ?>`;

                $('.shareqrcode').empty().qrcode({
                    render: 'image',
                    size: 500,
                    ecLevel: 'H',
                    minVersion: 3,
                    quiet: 1,
                    text: url_link,
                    fill: foreground_color,
                    background: background_color,
                    radius: .01 * parseInt(radius, 10),
                    mode: parseInt(qr_type, 10),
                    label: qr_font,
                    fontcolor: qr_font_color,
                    image: $("#image-buffers")[0],
                    mSize: .01 * parseInt(size, 10)
                });
            <?php else: ?>
                $('.shareqrcode').qrcode(url_link);
            <?php endif; ?>
        });

        $(`.rating_preview`).attr('id');
        var from_$input = $('#input_from').pickadate(),
            from_picker = from_$input.pickadate('picker')


        var to_$input = $('#input_to').pickadate(),
            to_picker = to_$input.pickadate('picker')

        var is_enabled = "<?php echo e($is_enable); ?>";
        if (is_enabled) {
            $('#business-hours-div').show();
        } else {
            $('#business-hours-div').hide();
        }

        var is_contact_enable = "<?php echo e($is_contact_enable); ?>";
        if (is_contact_enable) {
            $('#contact-div').show();
        } else {
            $('#contact-div').hide();
        }

        var is_enable_appoinment = "<?php echo e($is_enable_appoinment); ?>";
        if (is_enable_appoinment) {
            $('#appointment-div').show();
        } else {
            $('#appointment-div').hide();
        }

        var is_enable_service = "<?php echo e($is_enable_service); ?>";
        if (is_enable_service) {
            $('#services-div').show();
        } else {
            $('#services-div').hide();
        }

        var is_enable_testimonials = "<?php echo e($is_enable_testimonials); ?>";
        if (is_enable_testimonials) {
            $('#testimonials-div').show();
        } else {
            $('#testimonials-div').hide();
        }

        var is_enable_sociallinks = "<?php echo e($is_enable_sociallinks); ?>";
        if (is_enable_sociallinks) {
            $('#social-div').show();
        } else {
            $('#social-div').hide();
        }

        var is_enable_gallery = "<?php echo e($is_enable_gallery); ?>";
        if (is_enable_gallery) {
            $('#gallery-div').show();
        } else {
            $('#gallery-div').hide();
        }

        var is_custom_html_enable = "<?php echo e($is_custom_html_enable); ?>";
        if (is_custom_html_enable) {
            $('.custom_html_text').show();
        } else {
            $('.custom_html_text').hide();
        }
        var is_branding_enable = "<?php echo e($is_branding_enabled); ?>";
        if (is_branding_enable) {
            $('.branding_text').show();
        } else {
            $('.branding_text').hide();
        }
        $(`#makeappointment`).click(function() {
            var name = $(`.app_name`).val();
            var email = $(`.app_email`).val();
            var date = $(`.datepicker_min`).val();
            var phone = $(`.app_phone`).val();
            // var time = $("input[type='radio']:checked").data('id');
            var time = $("input[type='radio']:checked").data('id');
            var business_id = '<?php echo e($business->id); ?>';

            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }
            $(`.span-error-date`).text("");
            $(`.span-error-time`).text("");
            $(`.span-error-name`).text("");
            $(`.span-error-email`).text("");

            if (date == "") {

                $(`.span-error-date`).text("<?php echo e(__('*Please choose date')); ?>");
                $(".close-search1").trigger({
                    type: "click"
                });
                // } else if (document.querySelectorAll('.app_time').length < 1) {
            } else if (document.querySelectorAll('input[type="radio"][name="time"]:checked').length < 1) {

                $(`.span-error-time`).text("<?php echo e(__('*Please choose time')); ?>");
                $(".close-search1").trigger({
                    type: "click"
                });
            } else if (name == "") {

                $(`.span-error-name`).text("<?php echo e(__('*Please enter your name')); ?>");
            } else if (email == "") {

                $(`.span-error-email`).text("<?php echo e(__('*Please enter your email')); ?>");
            } else if (phone == "") {

                $(`.span-error-phone`).text("<?php echo e(__('*Please enter your phone no')); ?>");
            } else {

                $(`.span-error-date`).text("");
                $(`.span-error-time`).text("");
                $(`.span-error-name`).text("");
                $(`.span-error-email`).text("");

                date = formatDate(date);
                $.ajax({
                    url: '<?php echo e(route('appoinment.store')); ?>',
                    type: 'POST',
                    data: {
                        "name": name,
                        "email": email,
                        "phone": phone,
                        "date": date,
                        "time": time,
                        "business_id": business_id,
                        "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function(data) {
                        if (data.flag == false) {
                            $(".close-search1").trigger({
                                type: "click"
                            });
                            show_toastr('Error', data.msg, 'error');

                        } else {
                            $(".close-search1").trigger({
                                type: "click"
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                            show_toastr('Success',
                                "<?php echo e(__('Thank you for booking an appointment.')); ?>", 'success');
                        }
                    }
                });
            }
        });

        $(`#makecontact`).click(function() {

            var name = $(`.contact_name`).val();
            var email = $(`.contact_email`).val();
            var phone = $(`.contact_phone`).val();
            var message = $(`.contact_message`).val();
            var business_id = '<?php echo e($business->id); ?>';

            $(`.span-error-contactname`).text("");
            $(`.span-error-contactemail`).text("");
            $(`.span-error-contactphone`).text("");
            $(`.span-error-contactmessage`).text("");

            if (name == "") {
                $(`.span-error-contactname`).text("<?php echo e(__('*Please enter your name')); ?>");
            } else if (email == "") {

                $(`.span-error-contactemail`).text("<?php echo e(__('*Please enter your email')); ?>");
            } else if (phone == "") {

                $(`.span-error-contactphone`).text("<?php echo e(__('*Please enter your phone no.')); ?>");
            } else if (message == "") {
                $(`.span-error-contactmessage`).text("<?php echo e(__('*Please enter your message.')); ?>");
            } else {

                $(`.span-error-contactname`).text("");
                $(`.span-error-contactemail`).text("");
                $(`.span-error-contactphone`).text("");
                $(`.span-error-contactmessage`).text("");

                $.ajax({
                    url: '<?php echo e(route('contacts.store')); ?>',
                    type: 'POST',
                    data: {
                        "name": name,
                        "email": email,
                        "phone": phone,
                        "message": message,
                        "business_id": business_id,
                        "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function(data) {
                        $(".make-contact-modal-toggle").trigger({
                            type: "click"
                        });
                        show_toastr('Success', "<?php echo e(__('Your contact details has been noted.')); ?>",
                            'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);

                    }
                });
            }
        });
    </script>
    <?php if(isset($is_slug)): ?>
        <script>
            function show_toastr(title, message, type) {
                var o, i;
                var icon = '';
                var cls = '';

                if (type == 'success') {
                    icon = 'ti ti-check-circle';
                    cls = 'success';
                } else {
                    icon = 'ti ti-times-circle';
                    cls = 'danger';
                }

                $.notify({
                    icon: icon,
                    title: " " + title,
                    message: message,
                    url: ""
                }, {
                    element: "body",
                    type: cls,
                    allow_dismiss: !0,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 15,
                        y: 15
                    },
                    spacing: 80,
                    z_index: 1080,
                    delay: 2500,
                    timer: 2000,
                    url_target: "_blank",
                    mouse_over: !1,
                    animate: {
                        enter: o,
                        exit: i
                    },
                    template: '<div class="alert theme-toaster theme-toaster-success alert-{0} alert-icon theme-toaster-danger  theme-toaster-success  alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                });
            }
            if ($(".datepicker").length) {
                $('.datepicker').daterangepicker({
                    singleDatePicker: true,
                    format: 'yyyy-mm-dd',
                });
            }
        </script>
    <?php endif; ?>
    <?php if($message = Session::get('success')): ?>
        <script>
            show_toastr('Success', '<?php echo $message; ?>', 'success');
        </script>
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        <script>
            show_toastr('Error', '<?php echo $message; ?>', 'error');
        </script>
    <?php endif; ?>
    <!-- Google Analytic Code -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($business->google_analytic); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo e($business->google_analytic); ?>');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo e($business->fbpixel_code); ?>');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($business->fbpixel_code); ?>" /></noscript>
    <!-- Custom Code -->
    <script type="text/javascript">
        <?php echo $business->customjs; ?>

    </script>
    <?php if(isset($is_pdf)): ?>
        <?php echo $__env->make('business.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php endif; ?>
    <?php if(isset($is_slug)): ?>
        <?php if($is_gdpr_enabled): ?>
            <script src="<?php echo e(asset('js/cookieconsent.js')); ?>"></script>
            <script>
                let myVar = <?php echo json_encode($a); ?>;
                let data = JSON.parse(myVar);
                let language_code = document.documentElement.getAttribute('lang');
                let languages = {};
                languages[language_code] = {
                    consent_modal: {
                        title: 'hello',
                        description: 'description',
                        primary_btn: {
                            text: 'primary_btn text',
                            role: 'accept_all'
                        },
                        secondary_btn: {
                            text: 'secondary_btn text',
                            role: 'accept_necessary'
                        }
                    },
                    settings_modal: {
                        title: 'settings_modal',
                        save_settings_btn: 'save_settings_btn',
                        accept_all_btn: 'accept_all_btn',
                        reject_all_btn: 'reject_all_btn',
                        close_btn_label: 'close_btn_label',
                        blocks: [{
                                title: 'block title',
                                description: 'block description'
                            },

                            {
                                title: 'title',
                                description: 'description',
                                toggle: {
                                    value: 'necessary',
                                    enabled: true,
                                    readonly: false
                                }
                            },
                        ]
                    }
                };
            </script>
            <script>
                function setCookie(cname, cvalue, exdays) {
                    const d = new Date();
                    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                    let expires = "expires=" + d.toUTCString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }

                function getCookie(cname) {
                    let name = cname + "=";
                    let decodedCookie = decodeURIComponent(document.cookie);
                    let ca = decodedCookie.split(';');
                    for (let i = 0; i < ca.length; i++) {
                        let c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }


                // obtain plugin
                var cc = initCookieConsent();
                // run plugin with your configuration
                cc.run({
                    current_lang: 'en',
                    autoclear_cookies: true, // default: false
                    page_scripts: true,
                    // ...
                    gui_options: {
                        consent_modal: {
                            layout: 'cloud', // box/cloud/bar
                            position: 'bottom center', // bottom/middle/top + left/right/center
                            transition: 'slide', // zoom/slide
                            swap_buttons: false // enable to invert buttons
                        },
                        settings_modal: {
                            layout: 'box', // box/bar
                            // position: 'left',           // left/right
                            transition: 'slide' // zoom/slide
                        }
                    },

                    onChange: function(cookie, changed_preferences) {},
                    onAccept: function(cookie) {
                        if (!getCookie('cookie_consent_logged')) {
                            var cookie = cookie.level;
                            var slug = '<?php echo e($business->slug); ?>';
                            $.ajax({
                                url: '<?php echo e(route('card-cookie-consent')); ?>',
                                datType: 'json',
                                data: {
                                    cookie: cookie,
                                    slug: slug,
                                },
                            })
                            setCookie('cookie_consent_logged', '1', 182, '/');
                        }
                    },
                    languages: {
                        'en': {
                            consent_modal: {
                                title: data.cookie_title,
                                description: data.cookie_description + ' ' +
                                    '<button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                                primary_btn: {
                                    text: "<?php echo e(__('Accept all')); ?>",
                                    role: 'accept_all' // 'accept_selected' or 'accept_all'
                                },
                                secondary_btn: {
                                    text: "<?php echo e(__('Reject all')); ?>",
                                    role: 'accept_necessary' // 'settings' or 'accept_necessary'
                                },
                            },
                            settings_modal: {
                               title: "<?php echo e(__('Cookie preferences')); ?>",
                               save_settings_btn: "<?php echo e(__('Save settings')); ?>",
                                accept_all_btn: "<?php echo e(__('Accept all')); ?>",
                                reject_all_btn: "<?php echo e(__('Reject all')); ?>",
                                close_btn_label: "<?php echo e(__('Close')); ?>",
                                cookie_table_headers: [{
                                        col1: 'Name'
                                    },
                                    {
                                        col2: 'Domain'
                                    },
                                    {
                                        col3: 'Expiration'
                                    },
                                    {
                                        col4: 'Description'
                                    }
                                ],
                                blocks: [{
                                    title: data.cookie_title + ' ' + '📢',
                                    description: data.cookie_description,
                                }, {
                                    title: data.strictly_cookie_title,
                                    description: data.strictly_cookie_description,
                                    toggle: {
                                        value: 'necessary',
                                        enabled: true,
                                        readonly: true // cookie categories with readonly=true are all treated as "necessary cookies"
                                    }
                                }, {
                                    title: "<?php echo e(__('More information')); ?>",
                                    description: data.more_information_description + ' ' +
                                        '<a class="cc-link" href="' + data.contactus_url + '">Contact Us</a>.',
                                }]
                            }
                        }
                    }

                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>

<?php
  exit();
?><?php /**PATH /var/www/vmycards-2/resources/views/card/theme4/index.blade.php ENDPATH**/ ?>