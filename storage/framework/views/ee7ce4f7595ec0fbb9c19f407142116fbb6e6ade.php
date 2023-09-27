<?php
$chatgpt_setting= App\Models\Utility::chatgpt_setting(\Auth::user()->creatorId());
?>
<?php echo e(Form::open(['url' => 'plans', 'enctype' => 'multipart/form-data'])); ?>

<?php if(isset($chatgpt_setting['chatgpt_key']) && (!empty($chatgpt_setting['chatgpt_key']))): ?>
    <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end"
        data-bs-placement="top">
        <a href="#" data-size="lg" class="btn btn-sm btn-primary" data-ajax-popup-over="true"
            data-url="<?php echo e(route('generate', ['plan'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate content with AI')); ?>">
            <i class="fas fa-robot"></i>&nbsp;<?php echo e(__('Generate with AI')); ?>

        </a>
    </div>
<?php endif; ?>
 <div class="row">
     <div class="form-group col-md-6">
         <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

         <?php echo e(Form::text('name', null, ['class' => 'form-control font-style', 'placeholder' => __('Enter Plan Name'), 'required' => 'required'])); ?>

     </div>
     <div class="form-group col-md-6">
         <?php echo e(Form::label('price', __('Price'), ['class' => 'form-label'])); ?>

         <?php echo e(Form::number('price', null, ['class' => 'form-control', 'placeholder' => __('Enter Plan Price')])); ?>

     </div>
     <div class="form-group col-md-6">
         <?php echo e(Form::label('duration', __('Duration'), ['class' => 'form-label'])); ?>

         <?php echo Form::select('duration', $arrDuration, null, ['class' => 'form-control select2', 'required' => 'required']); ?>

     </div>
     <div class="form-group col-md-6">
         <?php echo e(Form::label('max_users', __('Max User'), ['class' => 'form-label'])); ?>

         <?php echo e(Form::number('max_users', null, ['class' => 'form-control', 'placeholder' => __('Enter Max User Create Limite')])); ?>

         <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
     </div>
     <div class="form-group col-md-6">
         <?php echo e(Form::label('business', __('Max Business'), ['class' => 'form-label'])); ?>

         <?php echo e(Form::number('business', null, ['class' => 'form-control', 'placeholder' => __('Enter Max Business Create Limite')])); ?>

         <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
     </div>
     <div class="form-group col-md-6">
        <label for="storage_limit" class="form-label"><?php echo e(__('Storage limit')); ?></label>
        <div class="input-group">
            <input class="form-control" required="required" name="storage_limit" type="number" id="storage_limit">
            <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><?php echo e(__('MB')); ?></span>
            </div>
        </div>
        <span class="small"><?php echo e(__('Note: upload size ( In MB)')); ?></span>
    </div>
     <div class="col-6">
         <div class="form-check form-switch custom-switch-v1">
             <input type="checkbox" class="form-check-input input-primary" name="enable_custdomain"
                 id="enable_custdomain">
             <label class="custom-control-label form-control-label"
                 for="enable_custdomain"><?php echo e(__('Enable Domain')); ?></label>
         </div>
     </div>
     <div class="col-6">
         <div class="form-check form-switch custom-switch-v1">
             <input type="checkbox" class="form-check-input input-primary" name="enable_custsubdomain"
                 id="enable_custsubdomain">
             <label class="custom-control-label form-control-label"
                 for="enable_custsubdomain"><?php echo e(__('Enable Sub Domain')); ?></label>
         </div>
     </div>

     <div class="col-6"><br>
         <div class="form-check form-switch custom-switch-v1">
             <input type="checkbox" class="form-check-input input-primary" name="enable_branding" id="enable_branding">
             <label class="branding-control-label form-control-label"
                 for="enable_branding"><?php echo e(__('Enable Branding')); ?></label>
         </div>
     </div>
     <div class="col-6"><br>
         <div class="form-check form-switch custom-switch-v1">
             <input type="checkbox" class="form-check-input input-primary" name="pwa_business" id="pwa_business">
             <label class="branding-control-label form-control-label"
                 for="pwa_business"><?php echo e(__('Progressive Web App (PWA)')); ?></label>
         </div>
     </div>
     <div class="col-6"><br>
         <div class="form-check form-switch custom-switch-v1">
             <input type="checkbox" class="form-check-input input-primary" name="enable_qr_code" id="enable_qr_code">
             <label class="branding-control-label form-control-label"
                 for="enable_qr_code"><?php echo e(__('Enable QR Code')); ?></label>
         </div>
     </div>
     <div class="col-6"><br>
         <div class="form-check form-switch custom-switch-v1">
             <input type="checkbox" class="form-check-input" name="enable_chatgpt" id="enable_chatgpt">
             <label class="custom-control-label form-check-label"
                 for="enable_chatgpt"><?php echo e(__('Enable Chatgpt')); ?></label>
         </div>
     </div>
     <div class="horizontal mt-3">

         <div class="verticals twelve">
             <div class="form-group col-md-6">
                 <?php echo e(Form::label('Select Themes', __('Select Themes'), ['class' => 'form-control-label'])); ?>

             </div>
             <ul class="uploaded-pics">
                 <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li>
                         <input type="checkbox" id="checkthis<?php echo e($loop->index); ?>" value="<?php echo e($key); ?>"
                             name="themes[]" checked />
                         <label for="checkthis<?php echo e($loop->index); ?>"><img
                                 src="<?php echo e(asset(Storage::url('uploads/card_theme/' . $key . '/color1.png'))); ?>" /></label>
                     </li>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
         </div>


     </div>

     <div class="form-group col-md-12">
         <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

         <?php echo Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']); ?>

     </div>

 </div>
 <div class="modal-footer p-0 pt-3">
     <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
     <input class="btn btn-primary" type="submit" value="<?php echo e(__('Create')); ?>">
 </div>
 <?php echo e(Form::close()); ?>

<?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/plan/create.blade.php ENDPATH**/ ?>