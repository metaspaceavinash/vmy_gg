
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
<?php $__env->startPush('css-page'); ?>
<style>
    .export-btn
    {
        float:right;
    }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body table-border-style">
            <h5></h5>
            <button class="csv btn btn-sm btn-primary export-btn d-none"><?php echo e(__('Export')); ?></button>
            <div class="table-responsive">
                <table class="table" id="pc-dt-export">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Order ID')); ?></th>
                            <th><?php echo e(__('Business Name')); ?></th>
                            <th><?php echo e(__('Designation')); ?></th>
                            <th><?php echo e(__('Email')); ?></th>
                            <th><?php echo e(__('Comment')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $card_request_deatails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e(strpad($val->id)); ?></td>
                                <td><?php echo e($val->name); ?></td>
                                <td><?php echo e($val->designation); ?></td>
                                <td><?php echo e($val->email); ?></td>
                                <td><?php echo e($val->comment); ?></td>
                                <?php
                                    $status =  getStatus($val->status);
                                    $st_class =  getStClass($val->status);
                                ?>
                                <td><span class="badge bg-<?php echo e($st_class); ?> p-2 px-3 rounded"><?php echo e(ucFirst($status)); ?></span></td>
                               
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
<script>
   const table = new simpleDatatables.DataTable("#pc-dt-export", {
        searchable: true,
        fixedheight: true,
        dom: 'Bfrtip',
    });

    $('.csv').on('click', function() {
        $('#ignore').remove();
        $("#pc-dt-export").table2excel({
            filename: "appointmentDetail"
        });
        setTimeout(function() {
            location.reload();
       }, 2000);
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/view_orders.blade.php ENDPATH**/ ?>