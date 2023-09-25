
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
            <button class="csv btn btn-sm btn-primary export-btn"><?php echo e(__('Export')); ?></button>
            <div class="table-responsive">
                <table class="table" id="pc-dt-export">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Order ID')); ?></th>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Business Name')); ?></th>
                            <th><?php echo e(__('Designation')); ?></th>
                            <th><?php echo e(__('Order Date')); ?></th>
                            <th><?php echo e(__('Comment')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th id="ignore"><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $card_request_deatails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                 <td><?php echo e(strpad($val->id)); ?></td>
                                <td><?php echo e(getUserName($val->user_id)); ?></td>
                                <td><?php echo e(getBusinessName($val->business_id)); ?></td>
                                <td><?php echo e($val->designation); ?></td>
                                <td><?php echo e(dmy($val->ordered_at)); ?></td>
                                <td><?php echo e($val->comment); ?></td>

                                <?php
                                    $status =  getStatus($val->status);
                                    $st_class =  getStClass($val->status);
                                ?>
                                <td><span class="badge bg-<?php echo e($st_class); ?> p-2 px-3 rounded"  title="<?php echo e(ucFirst($status)); ?>" ><?php echo e(ucFirst($status)); ?></span></td>
                                <div class="row float-end">
                                    <td class="d-flex">
            <div class="d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="Change Status">
            <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-target="#exampleModal" data-url="<?php echo e(route('physical_card.action_popup',$val->id)); ?>"  data-url="" data-bs-whatever="Action" data-bs-toggle="modal">
                                                            <span class="text-white">
                                                                 Change Status</span>
                                                        </a>
                                                    </div>


                    <div class="d-flex align-items-center justify-content-between justify-content-md-end"
                    data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="View">
                    <a href="#" class="btn btn-sm btn-secondary btn-icon m-1" data-bs-target="#bigModal" 
                    data-url="<?php echo e(route('physical_card.action_view_card',$val->id)); ?>"
                    data-url="" data-bs-whatever="Action" data-bs-toggle="modal">
                    <span class="text-white">View</span></a></div>

                                    </td>
                                </div>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bigModal" tabindex="-1" role="dialog" aria-labelledby="bigModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bigModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ddd">
                View Card
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
<script>


                    var bigModal = document.getElementById('bigModal')
                    bigModal.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var recipient = button.getAttribute('data-bs-whatever')
                    var url = button.getAttribute('data-url')

                    var modalTitle = bigModal.querySelector('.modal-title')
                    var modalBodyInput = bigModal.querySelector('.modal-body input')
                    modalTitle.textContent = recipient
                    var size = button.getAttribute('data-size');
                    $("#bigModal .modal-dialog").addClass('modal-' + size);
                    $.ajax({
                        url: url,
                        success: function(data) {
                            $('#bigModal .modal-body').html(data);
                            $("#bigModal").modal('show');
                        },
                        error: function(data) {
                            data = data.responseJSON;
                            toastrs('Error', data.error, 'error')
                        }
                    });
                })
       
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vmy_gg\vmycard\resources\views/physical-cards/sadmin_view_orders.blade.php ENDPATH**/ ?>