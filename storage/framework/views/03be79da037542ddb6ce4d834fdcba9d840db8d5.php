<?php $__env->startSection('title', trans('frontend.frontend_user_forgot_password') .' - '. get_site_title()); ?>
<?php $__env->startSection('content'); ?>
<div class="container"><br>  
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12">
              <h3 class="text-center"><?php echo e(trans('frontend.forgot_password')); ?></h3>
              <p><?php echo e(trans('frontend.reset_password_msg')); ?></p>
            </div>
          </div>
          <hr>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              
              <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                
                <div class="form-group has-feedback">
                  <input type="email" placeholder="<?php echo e(ucfirst( trans('frontend.email') )); ?>" class="form-control" id="user_forgot_pass_email_id"name="user_forgot_pass_email_id">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                  <input type="password" placeholder="<?php echo e(ucfirst(trans('frontend.enter_new_password'))); ?>" class="form-control" id="user_forgot_new_password" name="user_forgot_new_password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                  <input type="text" placeholder="<?php echo e(ucfirst(trans('frontend.secret_key'))); ?>" class="form-control" id="user_forgot_secret_key" name="user_forgot_secret_key">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <input name="user_forgot_pass_submit" id="user_forgot_pass_submit" class="form-control btn btn-default" value="<?php echo e(trans('frontend.reset_my_password')); ?>" type="submit">
                    </div>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>