<?php
    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar');
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = Utility::getValByName('company_logo');
    $company_small_logo = Utility::getValByName('company_small_logo');
    $currantLang = $users->currentLanguage();
    $fullLang = \App\Models\Languages::where('code', $currantLang)->first();
    $languages = Utility::languages();
    
    $businesses = App\Models\Business::allBusiness();
    $currantBusiness = $users->currentBusiness();
    //$bussiness_id = !empty($users->current_business)?$users->current_business:'';
    $bussiness_id = $users->current_business;
?>

<!-- [ Header ] start -->
<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <header class="dash-header transprent-bg">
    <?php else: ?>
        <header class="dash-header">
<?php endif; ?>

<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar avatar avatar-sm rounded-circle">
                        <img
                            src="<?php echo e(!empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png'); ?>" /></span>
                    <span class="hide-mob ms-2"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">
                    <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span><?php echo e(__('Profile')); ?></span>
                    </a>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="ti ti-power"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                    </a>
                    <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </div>
            </li>
        </ul>
    </div>
    <?php if(Auth::user()->type != 'super admin'): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create business')): ?>
            <div class="d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top">
                <a href="#" data-size="xl" data-url="<?php echo e(route('business.create')); ?>" data-ajax-popup="true"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-original-title="<?php echo e(__('Create your new bussiness')); ?>"
                    data-title="<?php echo e(__('Create New Business')); ?>"
                    class="btn cust-btn-creat  d-inline-flex align-items-center rounded  shadow-sm border border-success ">
                    <i class="ti ti-plus me-2"></i>
                    <span class="hide-mob"><?php echo e(__('Create Bussiness')); ?></span>
                </a>
            </div>
        <?php endif; ?>
        
        <ul class="list-unstyled">
            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0 cust-btn shadow-sm border border-success"
                    data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-original-title="<?php echo e(__('Select your bussiness')); ?>">
                    <i class="ti ti-credit-card"></i>
                    <span class="drp-text hide-mob"><?php echo e(__(ucfirst($currantBusiness))); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('business.change', $key)); ?>" class="dropdown-item">
                            <i
                                class="<?php if($bussiness_id == $key): ?> ti ti-checks text-primary <?php elseif($currantBusiness == $business): ?> ti ti-checks text-primary <?php endif; ?> "></i>
                            <span><?php echo e(ucfirst($business)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="dropdown-divider m-0"></div>
                </div>
            </li>
        </ul>

        
    <?php endif; ?>
    <ul class="list-unstyled">
        <li class="dropdown dash-h-item drp-language">
            <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <i class="ti ti-world nocolor"></i>
                <span class="drp-text hide-mob"><?php echo e(ucFirst($fullLang->fullName)); ?></span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
            </a>
            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                <?php $__currentLoopData = App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('change.language', $code)); ?>"
                        class="dropdown-item <?php echo e($currantLang == $code ? 'text-primary' : ''); ?>">
                        <span><?php echo e(ucFirst($lang)); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="dropdown-divider m-0"></div>
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <a href="#" data-size="md" data-url="<?php echo e(route('create.language')); ?>" data-ajax-popup="true"
                        data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                        data-title="<?php echo e(__('Create New Language')); ?>" class="dropdown-item text-primary">
                        <?php echo e(__('Create Language')); ?>

                    </a>
                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <a class="dropdown-item text-primary"
                        href="<?php echo e(route('manage.language', [$currantLang])); ?>"><?php echo e(__('Manage Language')); ?></a>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</div>
</header>
<!-- [ Header ] end -->
<?php /**PATH /var/www/vmycards-2/resources/views/partials/admin/menu.blade.php ENDPATH**/ ?>