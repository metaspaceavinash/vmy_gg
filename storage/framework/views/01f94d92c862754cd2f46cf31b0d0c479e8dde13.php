<?php 
$SER=env('APP_URL');
$card_id=4;
?>
<?php echo $__env->make('physical-cards.css_ph1',[$SER,$card_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="<?php echo e($logo_white); ?>" width="150px"  >
                </div>
                <div class="flip-card-back ww5">
                    <ul class="info">
                        <li><div class="shareqrcode"></div></li>
                        <li class="name-crdowner"><?php echo e($title); ?></li>
                        <li class="degnition"><?php echo e($designation); ?></li>
                        
                    </ul>
                </div>
            </div>
        </div>
<?php echo $__env->make('physical-cards.common_qr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/4/index.blade.php ENDPATH**/ ?>