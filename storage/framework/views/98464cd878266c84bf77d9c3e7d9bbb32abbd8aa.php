<?php echo e(Form::open(array('route'=>'physical_card.pstatus_store','method'=>'post'))); ?>

<div class="card">
    <div class="row">
        <div class="col-12">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('platform', __('Status'),['class'=>'form-label'])); ?>

                <?php echo Form::select('p_status', $p_status, null,array('class' => 'form-control select2 p_status','required'=>'required')); ?>

                <?php $__errorArgs = ['platform'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="invalid-role" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('pixel_id',__('Comment'))); ?>

                <?php echo e(Form::text('p_comment',null,array('class'=>'form-control mt-2','placeholder'=>__('Enter Comment')))); ?>

                <?php $__errorArgs = ['pixel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-name" role="alert">
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <input type="hidden" name="p_id" value="<?php echo e($p_id); ?>">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/action_popup.blade.php ENDPATH**/ ?>