
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
 
<style>
        .successbox {
    margin: auto;
    text-align: center;
}
.boxsuccess {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}

i.fa.fa-check {
    background: green;
    color: #fff;
    padding: 10px;
    font-size: 62px;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    line-height: 52px;
}

.successbox p {
    font-size: 20px;
    color: #575151;
    font-size: 18px;
    line-height: 26px;
}
</style>

<div class="boxsuccess">
<div class="successbox">
    <i class="fa fa-check" aria-hidden="true"></i>
    <h2>Order Success</h2>
    <p></p>
<p>Your order has been place successfully, We will dispatch your order within <br/> 2-3 business working days.</p>

<a href=" <?php echo e(route('physical.view_request_order')); ?> " class="btn btn-lg btn-primary btn-create"> View Order </a> 

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/okay_page.blade.php ENDPATH**/ ?>