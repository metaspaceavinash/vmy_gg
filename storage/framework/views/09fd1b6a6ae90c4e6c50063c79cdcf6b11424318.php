
<?php
    $dir = asset(Storage::url('uploads/plan'));
    $qr_path = \App\Models\Utility::get_file('qrcode');
    $SER=env('APP_URL');   //$_SERVER['HTTP_ORIGIN'];
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plans')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Physical Card
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create plan')): ?>
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end"
            data-bs-placement="top">
            <?php if(App\Models\Utility::getPaymentIsOn() && \Auth::user()->type == 'super admin'): ?>
                <a href="#" data-size="lg" data-url="<?php echo e(route('plans.create')); ?>" data-ajax-popup="true"
                    data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create New Plan')); ?>"
                    class="btn btn-sm btn-primary">
                    <i class="ti ti-plus"></i>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page">Physical Card</li>
<?php $__env->stopSection(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<?php $__env->startPush('custom-scripts'); ?>
        <script src="<?php echo e(asset('custom/js/purpose.js')); ?>"></script>
        <?php if(isset($plan->enable_qr_code) && $plan->enable_qr_code == 'on'): ?>
            <script src="<?php echo e(asset('custom/js/jquery.qrcode.min.js')); ?>"></script>
        <?php else: ?>
            <script src="<?php echo e(asset('custom/js/jquery.qrcode.js')); ?>"></script>
            <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
        <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css-page'); ?>
    <style>
      

        .postion-r {
    position: relative;
    background-size: cover;
    width: 500px;
    height: 295px;
}
 

.info {
    padding: 0px;
    list-style: none;
}

.pos-a {
    position: absolute;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    color:#fff;
}
.img-logo {
    left: 0px;
    right: 0px;
    text-align: 0px;
    top: 0px;
    bottom: 0px;
    width: 188px;
    position: absolute;
    transform: translate(-4px, 123px);
}


.email {
    bottom: 78px;
    left: 37px;
}

.call {
    bottom: 32px;
    left: 37px;
}

.address {
    bottom: 32px;
    left: 300px;
}
.url {
    bottom: 78px;
    left: 300px;
}

.caption-front img {
    width: 197px;
    height: auto;
}
li.degnition {
    font-weight: bold;
    color: #ccc;
    position: absolute;
    top: 136px;
    left: 60px;
}

li.name-crdowner {
    font-weight: bold;
    font-size: 23px;
    position: absolute;
    color: #000;
    top: 106px;
    left: 58px;
}


li.name-crdowner {
    font-weight: bold;
    font-size: 28px;
    position: absolute;
    color: #000;
    top: 94px;
    left: 58px;
    color: #ffffff;
}




li.qrcode {
    position: absolute;
    right: 77px;
    top: 82px;
}
li.qrcode img {
    width: 100px !IMPORTANT;
    height: 100px;
}


.flip-card {
    background-color: transparent;
    width: 626px;
    height: 325px;
    /* perspective: 1000px; */
    /* margin: 0px; */
    margin: auto;
    /* background: #ccc; */
    padding: 10px;
    border: 2px dashed #ccc;
    border-radius: 15px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
  background-image: url("<?php echo e($SER); ?>/assets/card-images/1FrontBlank.png");
  display: flex;
    justify-content: center;
    align-items: center;
}

.flip-card-back {
  color: white;
  transform: rotateY(180deg);
  background-image: url("<?php echo e($SER); ?>/assets/card-images/1BackBlank.png");
}

.card-display{
    width: 626px;
    height: 325px;
}
img.spingif {
    position: absolute;
    z-index: 1;
    top: 114px;
    margin: auto;
    left: 0px;
    right: 0px;
}
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


 <div class=" row justify-content-center">
    <div class="col-12 col-lg-5">
        <img src="<?php echo e($SER); ?>/assets/card-images/loader3.gif" class="spingif d-none " />
        <div class="card-display">
                         <?php echo $htmlContent; ?>
                     
                </div>
        </div>
    </div>
         <style>
.ot {
    overflow-y: hidden !IMPORTANT;
    overflow-x: scroll !IMPORTANT;
}
.w-maxhere {
    display: flex;
    padding: 10px 0px;
}
.ot::-webkit-scrollbar {
    height: 15px;
}
.ot::-webkit-scrollbar-thumb {
    background: pink;
    border-radius: calc(15px / 2);
}

.flip-box-m, .flip-box-m img {
    height: 150px;
    width: 200px !important;
    margin: 20px !important;
}

.ot .custom-control-input{ display: none}
input[type="radio"]:checked + label img {
    border-radius: 14px;
    box-shadow: 5px 4px 15px rgba(22, 44, 78, 0.25);
    border-color: #162C4E;
    padding: 5px;
}


input[type="radio"]:checked + label img {
    border-radius: 14px;
    box-shadow: 5px 4px 15px rgba(22, 44, 78, 0.25);
    border-color: #162C4E;
    padding: 5px;
    border: 2px solid #008ecc;
}
</style>
<hr/>


     
</div>
</div>
<style>
    .sclFlex{
        flex-direction: row-reverse;
    }
</style>
<?php 
    $bid = isset($qr_detail->business_id) ? $qr_detail->business_id : null;
    $uid = isset($user->current_business) ? $user->current_business : null;
    $cid=null;


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

    <form name="card_request" id="card_request" action="/card_request" method="post">
        <input type="hidden" name="cid" id="cid" value="1" />
        <input type="hidden" name="bid" id="bid" value="<?php echo e($bussiness_id); ?>" />
        <input type="hidden" name="uid" id="uid" value="<?php echo e($users->id); ?>"/>
        <div class="d-flex align-items-center justify-content-between mt-3 sclFlex">
            <h5 class="mb-0"></h5>
            <button type="submit" class="btn btn-primary cardNewResss">   <i class="me-2" data-feather="folder"></i> Request Now</button>
        </div>
    </form>



 
         <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/single_physical_card.blade.php ENDPATH**/ ?>