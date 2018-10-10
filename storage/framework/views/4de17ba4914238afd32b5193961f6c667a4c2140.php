<?php $__env->startSection('shipping-method-flat-rate-content'); ?>
<?php if($shipping_method_data): ?>

<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="_shipping_method_name" value="save_flat_rate">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.shipping_method_flat_rate')); ?></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right" type="submit"><?php echo e(trans('admin.save')); ?></button>
      </div>
    </div>
  </div>
  
 <p><?php echo e(trans('admin.flat_rate_shipping_title')); ?></p>
 <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="col-sm-6">
              <?php echo e(trans('admin.enable_disable')); ?>

            </div>
            <div class="col-sm-6"> 
               <?php if($shipping_method_data['flat_rate']['enable_option'] == true): ?>
               <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputEnableFlatRate" id="inputEnableFlatRate">
                <?php echo e(trans('admin.enable_this_shipping_method')); ?>

              <?php else: ?>
                <input type="checkbox" class="shopist-iCheck" name="inputEnableFlatRate" id="inputEnableFlatRate">
                <?php echo e(trans('admin.enable_this_shipping_method')); ?>

              <?php endif; ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <?php echo e(trans('admin.method_title')); ?>

            </div>
            <div class="col-sm-6">
              <input type="text" placeholder="<?php echo e(trans('admin.title')); ?>" class="form-control" name="inputFlatRateTitle" id="inputFlatRateTitle" value="<?php echo e($shipping_method_data['flat_rate']['method_title']); ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <?php echo e(trans('admin.cost')); ?>

            </div>
            <div class="col-sm-6">
              <input type="number" placeholder="<?php echo e(trans('admin.cost')); ?>" class="form-control" min="0" step="any" name="inputFlatRateCost" id="inputFlatRateCost" value="<?php echo e($shipping_method_data['flat_rate']['method_cost']); ?>">
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</form>

<?php endif; ?>
<?php $__env->stopSection(); ?>