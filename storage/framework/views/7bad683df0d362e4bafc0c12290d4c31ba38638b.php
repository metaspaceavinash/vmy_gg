
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('landing/assets/css/style.css')); ?>">
      <!-- Stylesheets -->
      <!-- <link rel="stylesheet" href="./assets/css/docs.theme.min.css"> -->
      <!-- Owl Stylesheets -->
      <link rel="stylesheet" href="<?php echo e(asset('landing/assets/css/owl.carousel.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('landing/assets/css/owl.theme.default.min.css')); ?>">
      <script src="<?php echo e(asset('landing/assets/js/jquery.min.js')); ?>"></script>
      <script src="<?php echo e(asset('landing/assets/js/owl.carousel.js')); ?>"></script>

      <?php if($setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>
    <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .fab{
                font-size: 24px;
                padding: 7px 7px;
                color: #fff;
            }
            .fas{
                color:#333;
            }

    .socialLink{
                font-size: 10px !important;
                display: inline-block !important;
                padding: 0px !important;
                background: #333 !important;
                border-radius: 50% !important;
    }


    </style>
<?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/layouts/fix-header.blade.php ENDPATH**/ ?>