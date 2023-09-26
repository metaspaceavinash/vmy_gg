
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page-title'); ?>
    Physical Card Request
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active" aria-current="page">Physical Card Request</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Physical Card Request
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('physical-cards.shipping_address_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/shipping_address.blade.php ENDPATH**/ ?>