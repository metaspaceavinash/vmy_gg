
<?php 
    $profile=\App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Manage Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
   <?php echo e(__('Manage Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create user')): ?>
    <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" >  
        <a href="#" data-size="md" data-url="<?php echo e(route('users.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create New User')); ?>" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
        <?php if(Auth::user()->type == 'company'): ?>
        <a href="<?php echo e(route('userlogs.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-size="lg" data-bs-whatever="<?php echo e(__('UserlogDetail')); ?>"> <span
                class="text-white">
                <i class="ti ti-user" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Userlog Detail')); ?>"></i></span>
        </a>
    <?php endif; ?>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('User')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
<div class="row"> 

     <form class="row mt-4 mb-2  justify-content-md-end"   method="GET">
        
        <div class="col-xl-1 col-md-2">
            <button type="submit" class="btn btn-primary btm-lg mt-2"> <i class="fa fa-search"></i> Search </button>
        </div>
        <div class="col-xl-2 col-md-3">
            <div class="form-floating">
                <select class="form-select" name="filter"  id="floatingSelect" aria-label="Floating label select example">
                  <option selected value="">Select Date Ranger</option>
                  <option value="t">Today</option>
                  <option value="y">Yesterday</option>
                  <option value="7d">Last 7 Days</option>
                  <option value="30d">This 30 Days</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
        </div>  
    </form> 

    

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mo.</th>
            <?php if(\Auth::user()->type == 'super admin'): ?>
                <th scope="col">Plan</th>
                <th scope="col">Plan Exp.</th>
                <th scope="col">Business</th>
                <th scope="col">Appointments</th> 
            <?php endif; ?>
            <th scope="col">Reg. Date</th>
            <th scope="col">Action</th>
        </tr>
     </thead>
     <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td scope="row"><?php echo e($user->id); ?></td>
            <td>
                <a href="<?php echo e((!empty($user->avatar))? asset(Storage::url('uploads/avatar/'.$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))); ?>" target="_blank">
                 <img src="<?php echo e((!empty($user->avatar))? asset(Storage::url('uploads/avatar/'.$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))); ?>" class="rounded-circle img_users_fix_size">
               </a>
               <?php echo e($user->name); ?>

            </td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->country_code); ?>-<?php echo e($user->contact); ?></td>
            <?php if(\Auth::user()->type == 'super admin'): ?>
                <td><?php echo e(!empty($user->currentPlan)?$user->currentPlan->name:''); ?> </td> 
                <td><?php echo e(__('Plan Expired : ')); ?> <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date): __('Lifetime')); ?></td>
                <td><?php echo e($user->totalBusiness($user->id)); ?></td>
                <td><?php echo e($user->getTotalAppoinments()); ?></td>
                <td><?php echo e($user->created_at); ?></td>
                <td>
                    <button type="button" class="btn"
                        data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="feather icon-more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit user')): ?>
                            <a href="#" class="dropdown-item user-drop" data-url="<?php echo e(route('users.edit',$user->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Update User')); ?>"><i class="ti ti-edit"></i><span class="ml-2"><?php echo e(__('Edit')); ?></span></a>
                        <?php endif; ?>
                        <a href="#" data-url="<?php echo e(route('plan.upgrade',$user->id)); ?>" class="dropdown-item user-drop" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Upgrade Plan')); ?>"><i class="ti ti-upload"></i> <span class="ml-2"> <?php echo e(__('Upgrade Plan')); ?> </span> </a>   
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change password account')): ?>
                            <a href="#" class="dropdown-item user-drop" data-ajax-popup="true" data-title="<?php echo e(__('Reset Password')); ?>" data-url="<?php echo e(route('user.reset',\Crypt::encrypt($user->id))); ?>"><i class="ti ti-key"></i>
                            <span class="ml-2"><?php echo e(__('Reset Password')); ?></span></a>  
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete user')): ?>
                            <a href="#" class="bs-pass-para dropdown-item user-drop"  data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($user->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><i class="ti ti-trash"></i><span class="ml-2"><?php echo e(__('Delete')); ?></span></a>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],'id'=>'delete-form-'.$user->id]); ?>

                                <?php echo Form::close(); ?> 
                        <?php endif; ?> 
                        <?php if(\Auth::user()->type == 'company'): ?>
                            <a href="<?php echo e(route('userlogs.index', ['month'=>'','user'=>$user->id])); ?>"
                                class="dropdown-item user-drop"
                                data-bs-toggle="tooltip"
                                data-bs-original-title="<?php echo e(__('User Log')); ?>"> 
                                <i class="ti ti-history"></i>
                                <span class="ml-2"><?php echo e(__('Logged Details')); ?></span></a>
                        <?php endif; ?>
                    </div> 
                </td>
                <?php endif; ?> 
        </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </tbody>
</table> 

  <?php echo e($users->appends(request()->input())->links('pagination::bootstrap-5')); ?> 
</div>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vmycards-2/resources/views/user/index.blade.php ENDPATH**/ ?>